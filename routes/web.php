<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AdminController::class,'index']);
Route::get('/logout',[AdminController::class,'logout']);

include(__DIR__."/subroute/admin.php");
include(__DIR__."/subroute/dokter.php");
include(__DIR__."/subroute/pasien.php");


