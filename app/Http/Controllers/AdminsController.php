<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\review;

class AdminsController extends Controller{

    public function addResto(Request $request){
        $check = Restaurant::where("name","=",$request->name)->get();
        if($check != "[]"){
            $status = "Restaurant Already Exists";
            return $status;
        }else{
            $resto = new Restaurant;
            $resto -> name = $request -> name;
            $resto -> cuisine = $request -> cuisine;
            $resto -> location = $request -> location;
            $resto->save();
            return response()->json([
                "status" => "Success",
            ], 200);
        }
    }

    public function displayUsers(){
        $users = User::all();
        return response()->json([
            "status" => "Success",
            "All users" => $users
        ], 200);
    }

    public function monitorReviews(){
        $review = Review::all();
        return response()->json([
            "status" => "Success",
            "All reviews" => $review
        ], 200);
    }
}
