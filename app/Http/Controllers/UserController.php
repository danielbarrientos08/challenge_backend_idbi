<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;


class UserController extends Controller
{
    public function registerUser(UserRegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  \Hash::make($request->password);
        $user->save();

        return response()->json([
            'status'=>'success',
            'message'=>'Usuario registrado correctamente.',
            'user'=> $user
        ],201);

    }
}
