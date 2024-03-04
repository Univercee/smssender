<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Error;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(Request $request){
        try {
            $data = $request->all();
            if(!$data['email'] || !$data['password']){
                throw new Error("User not found");
            }
            $email = $data['email'];
            $password = $data['password'];
            $token = User::login($email, $password);
            return response()->json([
                'token' => $token
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
        
    }

    //
    public function logout(Request $request){
        try {
            $data = $request->all();
            $user_id = $data['user_id'];
            User::logout($user_id);
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th->getMessage()
            ], 500);
        }
    }

}
