<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PoliklinikController;

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