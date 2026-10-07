<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:55",
            "email" => "required|email|unique:users,email|max:100",
            "password" => ["required", "string", Password::min(6)->mixedCase()->numbers()->symbols()->uncompromised()],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ]);
        }

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "User created successfully."
        ]);
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "email" => "required|email|max:100",
            "password" => ["required", "string"],
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "token" => null,
                "message" => $validator->errors()
            ]);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                "success" => false,
                "token" => null,
                "message" => "Invalid Credentials."
            ]);
        }

        $token = $user->createToken($user->email)->plainTextToken;

        return response()->json([
            "success" => true,
            "token" => $token,
            "message" => "User LoggedIn."
        ]);
    }
}
