<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Poliklinik;
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

    public function index(Request $request){
        $dokter_list = Dokter::with('poliklinik')->paginate(25);
       
        return view("admin.dokter.index",compact("dokter_list"));
    }

    public function create(){
        $poliklinik_list = Poliklinik::all();
        return view("admin.dokter.create",compact("poliklinik_list"));
    }

    public function store(Request $request){
        $payload = $request->all();
        unset($payload['_token']);
        Dokter::create($payload);
        return Redirect::to("/admin/dokter");

    }
    public function edit(Request $request, $id){
        $poliklinik_list = Poliklinik::all();
        $dokter = Dokter::find($id);
        return view("admin.dokter.edit",compact("dokter",'poliklinik_list'));

    }
    public function update(Request $request,$id){
        $payload = $request->all();
        unset($payload['_token']);
        $dokter = Dokter::find($id);
        $dokter->update($payload);

        return Redirect::to("/admin/dokter");
    }
    public function destroy(Request $request,$id){
        $dokter = Dokter::find($id);
        $dokter->delete();
        return Redirect::to("/admin/dokter");
        
    }

}
