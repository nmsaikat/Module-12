<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/', function () {
    return view('welcome');
});

// Laravel Response Route
Route::get('/demo1', [DemoController::class, 'demo1']);

// Laravel Request Route
Route::get('/demo2', [DemoController::class, 'demo2']);
