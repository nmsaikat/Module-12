<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    // Binary And File Download Response
    function FileBinary(){
        $filePath = "upload/just.png";
        return response()->file($filePath);
    }

    function FileDownload() {
        $filePath = "upload/just.png";
        return response()->download($filePath);
    }
}
