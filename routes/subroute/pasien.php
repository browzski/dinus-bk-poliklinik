<?php
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PasienController;

Route::prefix("/pasien")->middleware("auth_pasien")->group(function(){
    Route::get('/',[PasienController::class,'dashboard']);
    Route::get('/detail/{id}',[PasienController::class,'detail']);

    Route::withoutMiddleware("auth_pasien")->group(function(){
        Route::get('/login',[PasienController::class,'getLogin']);
        Route::post('/login',[PasienController::class,'postLogin']);

        Route::get('/register',[PasienController::class,'getRegister']);
        Route::post('/register',[PasienController::class,'postRegister']);
    });

    Route::prefix("/antrian")->group(function(){
        Route::get('/',[AntrianController::class,'index']);
        Route::get('/{id}/cek-jadwal',[AntrianController::class,'cekJadwal']);
    });

    Route::prefix('/jadwal')->group(function(){
        Route::get('/{id}/appointment',[AppointmentController::class,'create']);
        Route::post('/{id}/appointment',[AppointmentController::class,'store']);
    });
 
});
