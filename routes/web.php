<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourrierController;

Route::get('/{any}', function () {
    return file_get_contents(public_path('index.html'));
})->where('any', '.*');