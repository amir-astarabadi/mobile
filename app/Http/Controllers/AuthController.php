<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\DB;

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
}
