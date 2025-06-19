<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    //public function register(Request $request)
    //{
       
    //}
    public function login(Request $request){
        $request->validate(['email' => 'required|email', 'password' => 'required']);

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json(['message' => 'Invalid credentials'] , 401);
        }

        //$user = Auth::user();
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('api-token')->plainTextToken;
        return response()->json(['token' => $token]);
    }
}