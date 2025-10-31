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

// Laravel Request JSON Body Route
Route::post('/demo3', [DemoController::class, 'demo3']);

// Request Header Route
Route::get('/demo4', [DemoController::class, 'demo4']);

// Request Form data Route
Route::post('/demo5', [DemoController::class, 'demo5']);

// Request Form Data Form File Upload Route
Route::post('/demo6', [DemoController::class, 'demo6']);

// Request IP Address Route
Route::post('/demo7', [DemoController::class, 'demo7']);
