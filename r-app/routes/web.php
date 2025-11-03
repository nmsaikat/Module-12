<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/demo1', [DemoController::class, 'FileBinary']);
// Route::get('/demo2', [DemoController::class, 'FileDownload']);

Route::get('/demo', [DemoController::class, 'demo']);