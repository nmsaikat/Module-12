<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    // Binary And File Download Response
    // function FileBinary(){
    //     $filePath = "upload/just.png";
    //     return response()->file($filePath);
    // }

    // function FileDownload() {
    //     $filePath = "upload/just.png";
    //     return response()->download($filePath);
    // }

    // Cookie Response
    // function Demo(){
    //     $name="token";
    //     $value="12345cf";
    //     $minutes=60;
    //     $path="/";
    //     $domain=$_SERVER['SERVER_NAME'];
    //     $secure=false;
    //     $httpOnly=true;

    //     return response("Hello")->cookie($name, $value, $minutes, $path, $domain, $secure, $httpOnly);
    // }


    // Response Header
    // function demo(){
    //     return response('Hello')->header('key1', 'value1');
    // }


    // Response View
    function demo() {
        return response()->view('page.home');
    }
}
