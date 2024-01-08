<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\RiwayatPasienController;

Route::prefix("/dokter")->middleware("auth_dokter")->group(function(){
    Route::get('/',[DokterController::class,'dashboard']);
    Route::get('/login',[DokterController::class,'getLogin'])->withoutMiddleware("auth_dokter");
    Route::post('/login',[DokterController::class,'postLogin'])->withoutMiddleware("auth_dokter");
    Route::prefix("/jadwal")->group(function(){
            Route::get('/create',[JadwalController::class,'create']);
            Route::post('/cek-jadwal',[JadwalController::class,'cekJadwal']);
            Route::post('/create',[JadwalController::class,'store']);
            Route::get('/',[JadwalController::class,'index']);
            Route::get('/{id}/edit',[JadwalController::class,'edit']);
            Route::post('/{id}/edit',[JadwalController::class,'update']);
            Route::get('/{id}/delete',[JadwalController::class,'destroy']);
    });
    Route::prefix("/periksa")->group(function(){
        Route::get('/create',[PeriksaController::class,'create']);
        Route::get('/',[PeriksaController::class,'index']);

        Route::get('/{id}',[PeriksaController::class,'periksa']);
        Route::post('/{id}',[PeriksaController::class,'postPeriksa']);
    });
    Route::prefix('/riwayat')->group(function(){
        Route::get('/',[RiwayatPasienController::class,'index']); 
        Route::get('/detail/{id}',[RiwayatPasienController::class,'detail']); 
    });
    Route::prefix('/profile')->group(function(){
        Route::get('/',[DokterController::class,'profile']);
        Route::post('/',[DokterController::class,'postProfile']);
    });
});