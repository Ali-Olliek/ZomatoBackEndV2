<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    public function signUp(Request $request, $user_type_id){
        $user = [];
        $user["fname"]=$request->fname;
        $user["lname"]=$request->lname;
        $user["email"]=$request->email;
        $user["user_type_id"]=$request->user_type_id;
        $user["gender"]=$request->gender;

        return response()->json([
            "status"=>"success",
            "users"=>$user
        ], 200);
    }
}
