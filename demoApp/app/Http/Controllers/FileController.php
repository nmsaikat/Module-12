<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    function download() {
        return response("Downloading a file");
    }

    function downloadInvoice($InvoiceId) {
        return response("Downloading PDF invoice with ID: {$InvoiceId}");
    }

    function downloadInvoiceWithType($InvoiceId, $filetype) {
        return response("Downloading {$filetype} invoice with ID: {$InvoiceId}");
    }

    function error() {
        return response("No Invoice ID Provided");
    }
}
