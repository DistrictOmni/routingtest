<?php

namespace App\Core\Middleware;

use App\Core\Auth\Models\User;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Database\Capsule\Manager as Capsule;

class AuthMiddleware
{
    public static function handle(): ?User
    {
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

            // `sub` is the user ID in the JWT
            $user = User::find($decoded->sub);
            if (!$user) {
                self::redirectToLogin();
            }

            return $user;
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
