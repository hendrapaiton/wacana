<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController
{

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = $request->user();
        $user->tokens()->delete();

        $accessTokenExpiresAt = Carbon::now()->addMinutes(15);
        $refreshTokenExpiresAt = Carbon::now()->addDays(1);

        $accessToken = $user->createToken('access_token', ['*'], $accessTokenExpiresAt)->plainTextToken;
        $refreshToken = $user->createToken('refresh_token', ['refresh'], $refreshTokenExpiresAt)->plainTextToken;

        $cookie = cookie(
            'refresh_token',
            $refreshToken,
            $refreshTokenExpiresAt->timestamp,
            '/',
            null,
            false,
            true,
            false,
            'Strict',
        );

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'access_token' => $accessToken,
            'access_exp' => $accessTokenExpiresAt,
            'token_type' => 'Bearer',
        ])->withCookie($cookie);
    }

    public function refresh(Request $request)
    {
        $refreshToken = $request->cookie('refresh_token');

        if (!$refreshToken) {
            return response()->json(['message' => 'Refresh token not found'], 401);
        }

        $token = PersonalAccessToken::findToken($refreshToken);

        if (!$token) {
            return response()->json(['message' => 'Invalid refresh token'], 401);
        }

        $user = $token->tokenable;
        Auth::setUser($user);

        $token->delete();

        $accessTokenExpiresAt = Carbon::now()->addMinutes(15);
        $refreshTokenExpiresAt = Carbon::now()->addDays(1);

        $newAccessToken = $user->createToken('access_token', ['*'], $accessTokenExpiresAt)->plainTextToken;
        $newRefreshToken = $user->createToken('refresh_token', ['refresh'], $refreshTokenExpiresAt)->plainTextToken;

        $cookie = cookie(
            'refresh_token',
            $newRefreshToken,
            $refreshTokenExpiresAt->timestamp,
            '/',
            null,
            false,
            true,
            false,
            'Strict',
        );

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'access_token' => $newAccessToken,
            'access_exp' => $accessTokenExpiresAt,
            'token_type' => 'Bearer',
        ])->withCookie($cookie);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    public function validate(Request $request)
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json(['message' => 'Access token not found'], 401);
        }

        $accessToken = PersonalAccessToken::findToken($token);

        if (!$accessToken || Carbon::parse($accessToken->created_at)->addMinutes(15)->isPast()) {
            return response()->json(['message' => 'Invalid or expired token'], 401);
        }

        $user = $accessToken->tokenable;
        Auth::setUser($user);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'access_token' => $token,
        ], 200);
    }
}
