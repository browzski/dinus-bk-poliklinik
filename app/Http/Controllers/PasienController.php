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
    public function getRegister(){
        return view('pasien.register');
    }
    public function postLogin(Request $request){
        $pasien = Pasien::where("nama",$request->nama)->where('no_hp',$request->no_hp)->first();
        if($pasien){
            $request->session()->put("role","pasien");
            $request->session()->put("data",$pasien);
               return Redirect::to('/pasien');
        }

    }

    private function handleNoRM(Pasien $pasien){
        $explode = explode("-",$pasien->no_rm);
        $number = intval($explode[1]) + 1;
        $number = sprintf("%03d",$number);
        $date = date("Ym");
        $return= $date."-".$number;
        return $return;
    }

    public function postRegister(Request $request){
        $payload = $request->all();
        unset($payload['_token']);

        $last_pasien = Pasien::orderBy('created_at',"DESC")->first();
        $payload['no_rm'] = self::handleNoRM($last_pasien);
        $pasien = Pasien::create($payload);
        if($pasien){
        $request->session()->put("role","pasien");
            $request->session()->put("data",$pasien);
            return Redirect::to('/pasien');
        }
    }
}
