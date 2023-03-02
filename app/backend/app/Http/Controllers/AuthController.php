<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        $user = Auth::user();
        $token = $user->createToken('API Token')->accessToken;
        return response()->json(['token' => $token], 200);
    }

    return response()->json(['message' => 'Invalid credentials'], 401);
}

}
