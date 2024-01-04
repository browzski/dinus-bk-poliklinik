<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class JadwalController extends Controller
{
    public function index(Request $request){
        $session = $request->session()->get('data');
        $jadwal_list = JadwalPeriksa::with('dokter')->paginate(25);
        return view("dokter.jadwal.index",compact("jadwal_list"));
    }
    public function create(Request $request){
        return view("dokter.jadwal.create");   
    }
    public function store(Request $request){
        // Start Validasi
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        if($jam_mulai > $jam_selesai){
            return json_encode([
                'status' => 401,
                'message' => "Jam Mulai tidak boleh lebih dari Jam Selesai",
                'data' => []
            ]);
        }

        $jadwal = JadwalPeriksa::where('hari',$request->hari)->where(function($query) use($jam_mulai){
            $query->where('jam_mulai',"<=",$jam_mulai); 
            $query->where('jam_selesai',">=",$jam_mulai); 
        })->first();
        if($jadwal){
            return json_encode([
                'status' => 400,
                'message' => "Terdapat Jadwal yang bertabrakan",
                'data' => $jadwal
            ]);
        }
        // END Validasi
        $userId = $request->session()->get('data')->id;
        $payload = $request->all();
        $payload['id_dokter'] = $userId;
        $create = JadwalPeriksa::create($payload);
        if($create){
            return json_encode([
                'status' => 200,
                'message' => 'Jadwal disimpan!',
                'data' => $create
            ]);
        }
        dd($jadwal);
    }
    public function destroy(Request $request, $id){
        $jadwal = JadwalPeriksa::find($id)->delete();
        return Redirect::to(url("/dokter/jadwal"));
    }
}
