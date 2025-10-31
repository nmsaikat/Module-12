<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    // Laravel Response Function
    function demo1(){
        // return "Hello";

        // return 150;

        // return null;

        // return true;

        // return ["Saikat", "Arafat", "Rafi"];

        // return (
        //     ["name" => "Saikat", "age" => 24, "city" => "Dhaka", "country" => "Bangladesh"] +
        //     ["name" => "Arafat", "age" => 25, "city" => "Chittagong", "country" => "Bangladesh"]
        // );

        // return response()->json(
        //     ["name" => "Yesmin", "age" => 24, "city" => "Dhaka", "country" => "Bangladesh"]
        // );

        // return response()->json(
        //     ["name" => "Yesmin", "age" => 24, "city" => "Dhaka", "country" => "Bangladesh"],
        //     203
        // );

        // return redirect('/');

        // return response()->file("favicon.ico");

        // return response()->download("index.php");

        return view('demo');

    }

    // Laravel Request Function 
    function demo2(){
        return "Hello";
    }
}
