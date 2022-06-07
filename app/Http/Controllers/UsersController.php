<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Review;

class UsersController extends Controller {
    // https://codingdriver.com/laravel-base64-image-upload-example.html#:~:text=For%20uploading%20base64%20image%20in,public%20storage%20folder%20easy%20way.
    public function store($img){
        $base64Image = explode(";base64,", $img);
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage;
        $image_base64 = base64_decode($base64Image[0]);
        
        return $image_base64;
}
    public function signUp(Request $request){
        $user = new User;
        $user ->name = $request ->name;
        $user ->email = $request->email;
        $user->img = self::store($request->img); // Needs UTF-8 Encoding first or something I'm not sure XD
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
