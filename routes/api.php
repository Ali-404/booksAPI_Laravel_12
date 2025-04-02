<?php

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// home
Route::get("/", function (Request $request){
    return response()->json([
        "message" => "Welcome to ALI-404 Hooks API ."
    ]);
});


// auth
Route::prefix("/auth")->group(function(){

    Route::middleware("auth:sanctum")->group(function(){
        Route::get('/user',[AuthController::class, "getUser"]);
        Route::post('/logout',[AuthController::class, "logout"]);
    });
    Route::post('/login',[AuthController::class, "login"]);
    Route::get('/',[AuthController::class, "all"]);
});


// books

Route::apiResource("books", BookController::class)->middlewareFor("store","auth:sanctum");
