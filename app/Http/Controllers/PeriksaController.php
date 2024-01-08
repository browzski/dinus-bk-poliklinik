<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoliklinik;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PeriksaController extends Controller
{
    public function index(){
        $daftar_list = DaftarPoliklinik::where('status_periksa',0)->paginate(25);
        return view('dokter.periksa.index',compact('daftar_list'));
    }

    public function periksa($id){
        $data = DaftarPoliklinik::find($id);
        $obat_list = Obat::all();
        return view('dokter.periksa.periksa',compact('data','obat_list'));
    }

    public function postPeriksa(Request $request, $id){
        try{
            DB::beginTransaction();
            $payload = $request->all();
            $data = DaftarPoliklinik::find($id);
            $periksa = Periksa::create([
                'id_daftar_poli' => $data->id,
                'tgl_periksa' => $payload['tgl_periksa'],
                'catatan' => $payload['catatan'],
                'biaya_periksa' => $payload['biaya_periksa']
            ]);

            $obat_list = json_decode($request['data-obat']);
            foreach($obat_list as $obat){
                DetailPeriksa::create([
                    'id_periksa' => $periksa->id,
                    'id_obat' => $obat->id
                ]);
            }

            $data->status_periksa = 1;
            $data->save();
            DB::commit();
            return Redirect::to('dokter/periksa');
        }catch(Exception $e){
            DB::rollBack();
            dd($e);
        }
    }
}
