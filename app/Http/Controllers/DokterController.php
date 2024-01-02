<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DokterController extends Controller
{
    public function dashboard(Request $request){
        return view('dokter.dashboard');
    }
    public function getLogin(){
        return view('dokter.login');
    }
    public function postLogin(Request $request){
        $dokter = Dokter::where("nama",$request->nama)->where('no_hp',$request->no_hp)->first();
        if($dokter){
            $request->session()->put("role","dokter");
            $request->session()->put("data",$dokter);
               return Redirect::to('/dokter');
        }

    }
}
