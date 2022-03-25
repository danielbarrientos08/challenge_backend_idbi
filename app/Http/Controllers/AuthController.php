<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'bail|required|email',
            'password' => 'required',
        ]);

        if(!Auth::attempt($request->only('email','password')))
        {
            return response()->json([
                'status'=>'failed',
                'message'=>'Email o contraseña incorrecto.'
            ],401);
        }

        $token = Auth::user()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'=>'success',
            'api_token' => $token,
            'token_type' => 'Bearer',
            'user' => Auth::user()
        ],200);
    }
}
