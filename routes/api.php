<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RestaurantsController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Users Sign Up, Sign In, and Edit Profile //

Route::POST("/SignUp", [UsersController::class, "SignUp"])->name("Sign-up");
Route::POST("/SignIn", [UsersController::class, "SignIn"])->name("Sign-in");
Route::POST("/EditProfile", [UsersController::class, "EditProfile"])->name("Edit-prof");

// Admins Add Restaurant, Display Users, Monitor Reviews //

Route::POST("/AddResto", [AdminsController::class, "AddResto"])->name("Add-resto");
Route::GET("/DisplayUsers", [AdminsController::class, "DisplayUsers"])->name("Display-users");
Route::GET("/MonitorReviews", [AdminsController::class, "MonitorReviews"])->name("Monitor-reviews");

// Restaurants Display all, Display Single Restaurant //

Route::GET("/AllRestaurants", [RestaurantsController::class, "DisplayAll"])->name("Display-all");
Route::GET("/Restaurant", [RestaurantsController::class, "DisplayResto"])->name("Display-resto");