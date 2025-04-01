<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function all(){
        return User::all();
    }

    public function getUser(Request $request){
        return $request->user();
    }


    public function login(Request $request){

        $request->validate([
            "email" => "required|email",
            "password" => "required|string"
        ]);


        $user = User::where(["email" => $request->email])->first();

        if (isset($user)){

            // check password

            if (!Hash::check($request->password,$user->password)){
                return response()->json([
                    "error" => "Wrong password !"
                ]);
            }

            $token = $user->createToken("loginToken")->plainTextToken;


            return response()->json([
                "message" => "Logged in successfully !",
                "token" => $token,
            ],200);

        }else {
            return response()->json([
                "error" => "Invalid User with email $request->email"
            ],422);
        }

    }


    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            "message" => "logged Out Successfully !"
        ]);
    }

}

