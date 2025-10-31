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

    // Laravel Request JSON Body Function
    function demo3(Request $request){
        $JsonBody = $request->input();
        return $JsonBody;
    }

    // Request Header Function
    function demo4(Request $request){
        $Head=$request->header();
        return $Head;
    }

    // Request Form Data Function
    function demo5(Request $request) {
        $FormData = $request->input();
        return $FormData;
    }

    // Request Form Data For File Upload Function
    function demo6(Request $request) {
        $myFile = $request->file('myindex');
        $myFile->move(public_path('upload'), $myFile->getClientOriginalName());
        return "File Uploaded Successfully";
    }

    // Request IP Address Function
    function demo7(Request $request) {
        return $request->ip();
    }
}
