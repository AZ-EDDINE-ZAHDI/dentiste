<?php

use App\Http\Controllers\AvanceController;
use App\Http\Controllers\RdvController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('auth.login');});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get('rdvs',[RdvController::class,'index']);
    Route::get('rdvs/search',[RdvController::class,'search']);
    Route::post('rdvs',[RdvController::class,'ajv'])->name('rdvs.ajv');
    Route::get('rdvs/create',[RdvController::class,'create']);
    Route::post('rdvs/create',[RdvController::class,'store'])->name('rdvs.store');
    Route::get('rdvs/edit/{id}',[RdvController::class,'edit']);
    Route::get('rdvs/supprimer/{id}',[RdvController::class,'destroy']);
    Route::post('modifierrdvs/{id}',[RdvController::class,'update']);

    Route::get('rdvs/supp/{id}',[AvanceController::class,'destroy']);

    Route::get('services/create',[ServiceController::class,'create']);
    Route::post('services/create',[ServiceController::class,'store'])->name('services.store');
    Route::get('services/edit/{id}',[ServiceController::class,'edit']);
    Route::get('services/supprimer/{id}',[ServiceController::class,'destroy']);
    Route::post('modifierservices/{id}',[ServiceController::class,'update']);
    
});
