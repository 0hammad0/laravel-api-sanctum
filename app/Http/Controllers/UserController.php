<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken($request->name)->plainTextToken;


        return response([
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    public function logout($id)
    {
        $user = User::findOrFail($id);
        $user->tokens()->delete();
        return response([
            'message' => 'Successfully Logged out'
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'gmail' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->gmail)->first();

        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response([
                'message' => 'gmail or password not correct'
            ], 200);
        }

        $token = $user->createToken($user->name)->plainTextToken;

        return response([
            'user' => $user,
            'token' => $token,
        ], 200);
    }
}
