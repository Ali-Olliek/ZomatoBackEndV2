<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Review;

class UsersController extends Controller {

    public function signUp(Request $request){
        $user = new User;
        $user ->name = $request ->name;
        $user ->email = $request->email;
        $user ->password = Hash::make($request ->password);
        $user ->user_type = $request->user_type_id;
        $user ->gender=$request->gender;
        $user -> save();
        return response()->json([
            "status"=>"success",
        ], 200);
    }

    public function signIn(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = User::where([
            ["email", "=", "$email"],
            ["password", "=", "$password"]
            ])->get();
        if ($user != "[]"){
            $status = "User Found";
        }else{
            die ("User Not Found!");
        }
        return response()->json([
            "status"=>$status,
            "user"=>$user
        ], 200);
    }

    public function updateProfile(Request $request){
        // Will Solve Later
    }

    public function addReview(Request $request){
        $review = new Review;
        $review ->description = $request->description;
        $review->save();
        return response()->json([
            "status"=>"success",
        ], 200);
    }
}
