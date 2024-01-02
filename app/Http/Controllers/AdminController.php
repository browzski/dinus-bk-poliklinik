<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard');

    }
    public function checkSession(Request $request){
        $sess = $request->session()->get("role");
        if($sess){
            if($sess == "dokter"){
                return Redirect::to("/dokter");
            }else{
                return Redirect::to("/admin");
            }
        }
        return Redirect::to("/admin/login");

    }
    public function dashboard(Request $request){
        return view('admin.dashboard');
    }
    public function getLogin(){
        return view('admin.login');
    }
    public function postLogin(Request $request){
        $admin = Admin::where("nama",$request->nama)->where('no_hp',$request->no_hp)->first();
        if($admin){
            $request->session()->put("role","admin");
            $request->session()->put("data",$admin);
               return Redirect::to('/admin');
        }

    }
    public function logout(Request $request){
        $request->session()->flush();
        return Redirect::to('/');

    }
}
