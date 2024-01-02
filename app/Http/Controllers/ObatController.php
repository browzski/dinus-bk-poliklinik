<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ObatController extends Controller
{
    public function index(){
        $obat_list = Obat::paginate(25);
        return view("admin.obat.index",compact("obat_list"));
    }
    public function create(){
        return view("admin.obat.create");

    }
    public function store(Request $request){
        $payload = $request->all();
        unset($payload['_token']);
        Obat::create($payload);
        return Redirect::to("/admin/obat");

    }
    public function edit(Request $request, $id){
        $obat = Obat::find($id);
        return view("admin.obat.edit",compact("obat"));

    }
    public function update(Request $request,$id){
        $payload = $request->all();
        unset($payload['_token']);
        $obat = Obat::find($id);
        $obat->update($payload);

        return Redirect::to("/admin/obat");
    }
    public function destroy(Request $request,$id){
        $obat = Obat::find($id);
        $obat->delete();
        return Redirect::to("/admin/obat");
        
    }
}
