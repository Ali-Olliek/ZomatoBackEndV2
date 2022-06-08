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

Route::group(['prefix'=>'v1'], function(){
    Route::group(['prefix'=>'User'], function(){
        Route::POST("/SignUp", [UsersController::class, "signUp"])->name("Sign-up");
        Route::POST("/SignIn", [UsersController::class, "signIn"])->name("Sign-in");
        Route::POST("/EditProfile/{id}", [UsersController::class, "editProfile"])->name("Edit-prof");
        Route::POST("/AddReview", [UsersController::class, "addReview"])->name("Add-rev");
        Route::POST("/EditReview/{id}", [UsersController::class, "editReview"])->name("Edit-rev");
        Route::GET("/SearchUsers/{name}", [UsersController::class, "searchUsers"])->name("Search-user");
    });

    // Admins Add Restaurant, Display Users, Monitor Reviews //
    Route::group(['prefix' => 'Admin'], function(){
        Route::group(['middleware' => 'role.admin'], function(){
            Route::POST("/AddRestaurant", [AdminsController::class, "addResto"])->name("Add-resto");
            Route::POST("/EditRestaurant/{id}", [AdminsController::class, "editResto"])->name("edit-resto");
            Route::GET("/DisplayUsers", [AdminsController::class, "displayUsers"])->name("Display-users");
            Route::GET("/MonitorReviews", [AdminsController::class, "monitorReviews"])->name("Monitor-reviews");
        });
    });

    // Restaurants Display all, Display Single Restaurant //
    Route::group(['prefix' => 'Restaurants'], function(){
        Route::GET("/AllRestaurants", [RestaurantsController::class, "displayAll"])->name("Display-all");
        Route::GET("/Restaurant/{name}", [RestaurantsController::class, "displayResto"])->name("Display-resto");
        Route::GET("/RestaurantCat/{category}", [RestaurantsController::class, "displayCat"])->name("Display-Cat");
    });

    // Misc Routes
    // put in Misc Controller
    Route::GET("/not-found", [RestaurantsController::class, "notFound"])->name("not-found");
});

// Route::group -> Groups APIs Together!
// Url example: api/User/SignUp
// I can nest groupings example Url:api/v1/User/Signup