<?php

namespace App\Http\Controllers;

use App\Models\DaftarPoliklinik;
use Illuminate\Http\Request;

class RiwayatPasienController extends Controller
{
    public function index(){
        $antrian_list = DaftarPoliklinik::where('status_periksa',1)->get();
        return view('dokter.riwayat.index',compact('antrian_list'));
    }
    public function detail($id){
        $data = DaftarPoliklinik::find($id);
        return view('dokter.riwayat.detail',compact('data'));
    }
}
