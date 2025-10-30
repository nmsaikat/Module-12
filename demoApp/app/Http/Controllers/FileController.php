<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function download() {
        return response("Downloading a file");
    }

    function downloadInvoice($InvoiceId) {
        return response("Downloading invoice with ID: {$InvoiceId}");
    }

    function error() {
        return response("No Invoice ID Provided");
    }
}
