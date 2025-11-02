<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    function DemoAction(Request $request) {
        return [
            "city" => "New York",
            "temperature" => "22°C",
            "condition" => "Sunny",
            "hourly_forecast" => [
                ["time" => "1 PM", "temp" => "21°C", "condition" => "Sunny"],
                ["time" => "2 PM", "temp" => "22°C", "condition" => "Sunny"],
                ["time" => "3 PM", "temp" => "23°C", "condition" => "Partly Cloudy"],
                ["time" => "4 PM", "temp" => "22°C", "condition" => "Partly Cloudy"],
                ["time" => "5 PM", "temp" => "21°C", "condition" => "Cloudy"],
            ]
        ];
    }
}
