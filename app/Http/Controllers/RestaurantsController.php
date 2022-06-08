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

    public function displayCat($cuisine){
        $resto = Restaurant::where("cuisine","LIKE", "%$cuisine%")->get();
        
        return response()->json([
            "status" => "Success",
            "Restaurant" => $resto
        ], 200);
    }

    public function notFound(){
        return response()->json([
            "status"=>"success",
            "User"=>"UnAuthorized"
        ]);
    }
}
