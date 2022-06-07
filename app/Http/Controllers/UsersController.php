<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsersController extends Controller {

    public function signUp(Request $request){
        $user = new User;
        $user ->name = $request ->name;
        $user ->email = $request->email;
        $user ->password = $request ->password;
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
        if ($user != null){
            return response()->json([
            "status"=>"success",
            "user"=>$user
        ], 200);
        }else{
            echo ("User Not Found!");
        }
    }
}
