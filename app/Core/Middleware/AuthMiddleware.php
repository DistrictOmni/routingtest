<?php

namespace App\Core\Middleware;

use App\Core\Auth\Models\User;
use App\Core\Database\Database;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Database\Capsule\Manager as Capsule;

class AuthMiddleware
{
    public static function handle(): ?User
    {
        // Check if the Authorization header is present
        $headers = getallheaders();
        if (!isset($headers['Authorization'])) {
            self::redirectToLogin();
        }

        // Extract the JWT token
        $token = str_replace('Bearer ', '', $headers['Authorization']);

        try {
            // Decode the token
            $decoded = JWT::decode($token, new Key('your_secret_key', 'HS256'));

            // Check if `jti` exists in the sessions table
            $session = Capsule::table('sessions')
                ->where('jti', $decoded->jti)
                ->first();

            if (!$session) {
                self::redirectToLogin();
            }

            // Fetch the authenticated user
            return User::find($decoded->sub); // `sub` should be user ID

        } catch (\Exception $e) {
            self::redirectToLogin();
        }

        return null;
    }

    private static function redirectToLogin()
    {
        header("Location: /auth/login");
        exit;
    }
}
