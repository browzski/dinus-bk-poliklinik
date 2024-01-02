<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;

class PoliklinikController extends Controller
{
    public function index(Request $request){
        $poliklinik_list = Poliklinik::paginate(25);
        return view("admin.poliklinik.index",compact("poliklinik_list"));
    }

    public function create(){
        return view("admin.poliklinik.create");
    }

    public function store(Request $request){
        $payload = $request->all();
        unset($payload['_token']);
        Poliklinik::create($payload);
        return Redirect::to("/admin/poliklinik");

    }
    public function edit(Request $request, $id){
        $poliklinik = Poliklinik::find($id);
        return view("admin.poliklinik.edit",compact("poliklinik"));

    }
    public function update(Request $request,$id){
        $payload = $request->all();
        unset($payload['_token']);
        $poliklinik = Poliklinik::find($id);
        $poliklinik->update($payload);

        return Redirect::to("/admin/poliklinik");
    }
    public function destroy(Request $request,$id){
        $poliklinik = Poliklinik::find($id);
        $poliklinik->delete();
        return Redirect::to("/admin/poliklinik");
        
    }

}
