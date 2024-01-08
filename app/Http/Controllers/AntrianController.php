<?php

namespace App\Http\Controllers;

use App\Models\JadwalPeriksa;
use App\Models\Poliklinik;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(){
        $antrian_list = Poliklinik::paginate(25);
        return view("pasien.antrian.index",compact("antrian_list"));
    }
    public function cekJadwal($id){
        $poliklinik = Poliklinik::find($id);
        $jadwal_list = JadwalPeriksa::whereHas('dokter',function($query) use ($id){
            $query->where('id_poli',$id);
        })->paginate();
        return view("pasien.antrian.jadwal",compact("jadwal_list",'poliklinik'));

    }
    
}
