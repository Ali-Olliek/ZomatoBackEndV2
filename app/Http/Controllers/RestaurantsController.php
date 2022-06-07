<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestaurantsController extends Controller
{
    public function displayAll(){
        $restos = Restaurant::all();
        return response()->json([
            "status" => "Success",
            "restos" => $restos
        ], 200);
    }


    public function displayResto($name){
    $resto = Restaurant::where("name", "LIKE", "%$name%")->get();
    
    return response()->json([
        "status" => "Success",
        "results" => $resto
    ], 200);
}
}
