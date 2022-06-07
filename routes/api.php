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

Route::POST("/SignUp", [UsersController::class, "signUp"])->name("Sign-up");
Route::POST("/SignIn", [UsersController::class, "signIn"])->name("Sign-in");
Route::POST("/EditProfile/{id}", [UsersController::class, "editProfile"])->name("Edit-prof");
Route::POST("/AddReview", [UsersController::class, "addReview"])->name("Add-rev");
Route::POST("/EditReview/{id}", [UsersController::class, "editReview"])->name("Edit-rev");
Route::GET("/SearchUsers/{name}", [UsersController::class, "searchUsers"])->name("Search-user");

// Admins Add Restaurant, Display Users, Monitor Reviews //

Route::POST("/AddRestaurant", [AdminsController::class, "addResto"])->name("Add-resto");
Route::POST("/EditRestaurant/{id}", [AdminsController::class, "editResto"])->name("edit-resto");
Route::GET("/DisplayUsers", [AdminsController::class, "displayUsers"])->name("Display-users");
Route::GET("/MonitorReviews", [AdminsController::class, "monitorReviews"])->name("Monitor-reviews");

// Restaurants Display all, Display Single Restaurant //

Route::GET("/AllRestaurants", [RestaurantsController::class, "displayAll"])->name("Display-all");
Route::GET("/Restaurant/{name}", [RestaurantsController::class, "displayResto"])->name("Display-resto");
Route::GET("/RestaurantCat/{category}", [RestaurantsController::class, "displayCat"])->name("Display-Cat");