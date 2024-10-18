<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $token = DB::transaction(function () use ($request) {
            $user = User::create($request->validated());
            return $user->createToken('*')->plainTextToken;
        });


        return response([
            'token' => $token
        ]);
    }

    public function login(LoginRequest $request)
    {
        $user = User::whereEmail($request->validated('email'))->first();

        if ($user && Hash::check($request->validated('password'), $user->password)) {
            $token = $user->createToken('')->plainTextToken;
            return response([
                'token' => $token
            ]);
        }

        return response(['message' => 'invalid credentials'], Response::HTTP_UNAUTHORIZED);
    }
}
