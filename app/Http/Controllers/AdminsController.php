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
            $status = "Failed";
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
            "users" => $users
        ], 200);
    }

    public function monitorReviews(){
        $review = Review::all();
        return response()->json([
            "status" => "Success",
            "reviews" => $review
        ], 200);
    }

    public function editResto(Request $request, $id){
        $resto = Restaurant::find($id);
        echo $resto;
        if($resto){
            $resto ->name = $request -> new_name;
            $resto ->cuisine = $request -> new_cuisine;
            $resto ->location = $request ->new_location;
            $resto->save();
            $status = "success";
            return $status;
        }
        else{
            $status = "Failed";
            return $status;
        }
    }
}
