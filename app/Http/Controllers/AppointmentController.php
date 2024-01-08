<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoliklinik;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    public function create($id){
        $jadwal = JadwalPeriksa::find($id);
        return view("pasien.jadwal.appointment",compact('jadwal'));
    }
    private function handleNoAntrian(){
        $poli = DaftarPoliklinik::orderBy('created_at','desc')->count();
        $number = $poli+1;
        return $number;

    }
    public function store(Request $request,$id){
        $payload = $request->all();
        unset($payload['_token']);
        $payload['id_jadwal'] = $id;
        $payload['id_pasien'] = $request->session()->get('data')->id;
        $payload['status_periksa'] = 0;
        $payload['no_antrian'] = self::handleNoAntrian();
        $daftar = DaftarPoliklinik::create($payload);
        if($daftar){
            return Redirect::to('pasien');
        }
        dd($daftar);
    }
}
