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
        // Instead of looking in $headers['Authorization'], read from $_COOKIE
        if (empty($_COOKIE['token'])) {
            self::redirectToLogin();
        }
    
        $token = $_COOKIE['token'];
    
        try {
            $decoded = JWT::decode($token, new Key('your_secret_key', 'HS256'));
    
            // Check sessions table for jti
            $session = Capsule::table('auth_sessions')
                ->where('jti', $decoded->jti)
                ->first();
    
            if (!$session) {
                self::redirectToLogin();
            }
    
            // sub => user ID
            $user = User::find($decoded->sub);
            if (!$user) {
                self::redirectToLogin();
            }
    
            // If successful, return the user
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
