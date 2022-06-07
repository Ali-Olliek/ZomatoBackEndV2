<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class AdminsController extends Controller
{
    public function addResto(Request $request){
        $resto = new Restaurant;
        $resto -> name = $request -> name;
        $resto -> cuisine = $request -> cuisine;
        $resto -> location = $request -> location;
        $resto->save();
    }

    public function displayUsers(){

    }

    public function monitorReviews(){

    }
}
