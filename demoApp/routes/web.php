<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'about']);

Route::get('/download', [FileController::class, 'download']);

route::get('/download/invoice/{InvoiceId}', [FileController::class, 'downloadInvoice']);

route::get('/download/invoice', [FileController::class, 'error']);
