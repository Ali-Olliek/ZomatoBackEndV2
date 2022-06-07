<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantsController extends Controller
{
    public function displayAll(){
        $restos = Restaurant::all();
        return response()->json([
            "status" => "Success",
            "Restaurants" => $restos
        ], 200);
    }


    public function displayResto($name){
    $resto = Restaurant::where("name", "LIKE", "%$name%")->get();
    
    return response()->json([
        "status" => "Success",
        "Restaurant" => $resto
    ], 200);
}
}
