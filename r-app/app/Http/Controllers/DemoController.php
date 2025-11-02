<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DemoController extends Controller
{
    function DemoAction(Request $request):JsonResponse {

        $code = 201;
        $content = [
            "name" => "Saikat",
            "city" => "Dhaka",
            "country" => "Bangladesh",
        ];
        return response()->json($content, $code);
    }
}
