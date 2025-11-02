<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    function DemoAction1() {
        // return "Hello1";
        return redirect('/demo2');
    }

    function DemoAction2(){
        return "Hello2";
    }
}
