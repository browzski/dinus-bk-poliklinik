<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BotController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\GitlabDataController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'index']);
Route::get('/logout',[AdminController::class,'logout']);

Route::prefix("/admin")->middleware("auth_admin")->group(function(){
    Route::get('/',[AdminController::class,'dashboard']);
    Route::get('/login',[AdminController::class,'getLogin'])->withoutMiddleware("auth_admin");
    Route::post('/login',[AdminController::class,'postLogin'])->withoutMiddleware("auth_admin");
    Route::prefix("/obat")->group(function(){
        Route::get('/create',[ObatController::class,'create']);
        Route::post('/create',[ObatController::class,'store']);
        
        Route::get('/',[ObatController::class,'index']);
        
        Route::get('/{id}/edit',[ObatController::class,'edit']);
        Route::post('/{id}/edit',[ObatController::class,'update']);

        Route::get('/{id}/delete',[ObatController::class,'destroy']);
    });
    Route::prefix("/dokter")->group(function(){
        Route::prefix("/jadwal")->group(function(){

        });
        Route::get('/create',[DokterController::class,'create']);
        Route::post('/create',[DokterController::class,'store']);
        
        Route::get('/',[DokterController::class,'index']);
        
        Route::get('/{id}/edit',[DokterController::class,'edit']);
        Route::post('/{id}/edit',[DokterController::class,'update']);

        Route::get('/{id}/delete',[DokterController::class,'destroy']);
    });
    Route::prefix("/poliklinik")->group(function(){
        Route::get('/create',[PoliklinikController::class,'create']);
        Route::post('/create',[PoliklinikController::class,'store']);
        
        Route::get('/',[PoliklinikController::class,'index']);
        
        Route::get('/{id}/edit',[PoliklinikController::class,'edit']);
        Route::post('/{id}/edit',[PoliklinikController::class,'update']);

        Route::get('/{id}/delete',[PoliklinikController::class,'destroy']);
    });
});

Route::prefix("/dokter")->middleware("auth_dokter")->group(function(){
    Route::get('/',[DokterController::class,'dashboard']);
    Route::get('/login',[DokterController::class,'getLogin'])->withoutMiddleware("auth_dokter");
    Route::post('/login',[DokterController::class,'postLogin'])->withoutMiddleware("auth_dokter");
    Route::prefix("/jadwal")->group(function(){
        
    });
    Route::prefix("/riwayat")->group(function(){

    });
});

Route::prefix("/pasien")->middleware("auth_pasien")->group(function(){
    Route::get('/',[PasienController::class,'dashboard']);
    Route::get('/login',[PasienController::class,'getLogin'])->withoutMiddleware("auth_pasien");
    Route::post('/login',[PasienController::class,'postLogin'])->withoutMiddleware("auth_pasien");
    Route::prefix("/periksa")->group(function(){

    });
    Route::prefix("/riwayat")->group(function(){

    });
});