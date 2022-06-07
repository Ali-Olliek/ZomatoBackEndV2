<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\review;

class AdminsController extends Controller{

    public function addResto(Request $request){
        $resto = new Restaurant;
        $resto -> name = $request -> name;
        $resto -> cuisine = $request -> cuisine;
        $resto -> location = $request -> location;
        $resto->save();
    }

    public function displayUsers(){
        $users = User::all();
        return response()->json([
            "status" => "Success",
            "restos" => $users
        ], 200);
    }

    public function monitorReviews(){
        $review = Review::all();
        return response()->json([
            "status" => "Success",
            "restos" => $review
        ], 200);
    }
}
