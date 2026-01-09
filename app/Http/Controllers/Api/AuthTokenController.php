<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthTokenController extends Controller
{
    /**
     * Issue a personal access token for API clients (Bearer token).
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email'       => 'required|email',
            'password'    => 'required|string',
            'device_name' => 'nullable|string|max:255',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        /** @var \App\Models\User $user */
        $user = $request->user();

        $token = $user->createToken($credentials['device_name'] ?? $request->userAgent() ?? 'api-token');

        return response()->json([
            'token' => $token->plainTextToken,
            'type'  => 'Bearer',
        ]);
    }

    /**
     * Revoke the current access token.
     */
    public function destroy(Request $request)
    {
        $token = $request->user()?->currentAccessToken();
        if ($token) {
            $token->delete();
        }

        return response()->json(['message' => 'Token revoked'], 204);
    }
}
