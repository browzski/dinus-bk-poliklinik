<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PasienController extends Controller
{
    public function dashboard(Request $request){
        return view('pasien.dashboard');
    }
    public function getLogin(){
        return view('pasien.login');
    }
    public function postLogin(Request $request){
        $pasien = Pasien::where("nama",$request->nama)->where('no_hp',$request->no_hp)->first();
        if($pasien){
            $request->session()->put("role","pasien");
            $request->session()->put("data",$pasien);
               return Redirect::to('/pasien');
        }

    }
}
