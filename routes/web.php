<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourrierController;

Route::get('/', function () {
    return view('welcome');
});