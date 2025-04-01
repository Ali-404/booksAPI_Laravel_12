<?php

use App\Http\Controllers\auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get("/", function (Request $request){
    return response()->json([
        "message" => "Welcome to ALI-404 Hooks API ."
    ]);
});

Route::prefix("/auth")->group(function(){

    Route::middleware("auth:sanctum")->group(function(){
        Route::get('/user',[AuthController::class, "getUser"]);
        Route::post('/logout',[AuthController::class, "logout"]);
    });
    Route::post('/login',[AuthController::class, "login"]);
    Route::get('/',[AuthController::class, "all"]);
});
