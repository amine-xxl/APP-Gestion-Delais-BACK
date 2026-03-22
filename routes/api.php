<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourrierController;

//Routes Definition
Route::get('/courriers',[CourrierController::class,'index']);
Route::get('/courriers/{id}', [CourrierController::class, 'show']);
Route::post('/courriers',[CourrierController::class,'store']);
Route::put('/courriers/{id}',[CourrierController::class,'update']);
Route::delete('/courriers/{id}',[CourrierController::class,'destroy']);