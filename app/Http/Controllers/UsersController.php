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
        $user = User::where('email', '=', $request->email)->first();
        $password = Hash::check('password', $user->password);
        //https://stackoverflow.com/a/25136309/18590539
        return response()->json([
            "status"=>"success",
            "user"=>$user
        ], 200);
    }

    public function editProfile(Request $request, $id){
        $user = User::find($id);
        if($user){
        $user -> name = $request ->new_name;
        $user -> email = $request ->new_email;
        $user -> password = Hash::make($request ->new_password);
        $user->save();
        }

        return response()->json([
            "status" => "success"
        ]);
    }

    public function addReview(Request $request){
        $review = new Review;
        $review ->description = $request->description;
        $review->save();
        
        return response()->json([
            "status"=>"success",
        ], 200);
    }

    public function searchUsers($name){
        $user = User::where("name","LIKE",$name)->get();

        return response()->json([
            "status" => "Success",
            "User with name" => $user
    ], 200);
    }

    public function editReview(Request $request, $id){
        $review = Review::find($id);
        if($review){
            $review -> description = $request ->new_description;
            $review->save();
        }
        return response()->json([
            "status" => "success"
        ]);
    }   
}
