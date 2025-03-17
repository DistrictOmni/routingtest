<?php

namespace App\Core\Middleware;

use App\Core\Auth\Models\User;
use App\Core\Auth\Models\Session;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Database\Capsule\Manager as Capsule;

class AuthMiddleware
{
    public static function handle(): ?User
    {
        // 1) Check if Authorization header is set (Bearer approach)
        $headers = getallheaders();
        if (!empty($headers['Authorization'])) {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
        }
        // 2) Otherwise check cookie
        elseif (!empty($_COOKIE['token'])) {
            $token = $_COOKIE['token'];
        }
        else {
            self::redirectToLogin();
        }

        try {
            // decode the JWT
// AuthMiddleware.php
$decoded = JWT::decode($token, new Key('my_super_secret_key', 'HS256'));

            // Check if jti exists in the sessions table
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
        // Ensure session is started
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Store the current URI so we can come back to it
        $_SESSION['intended_url'] = $_SERVER['REQUEST_URI'];
    
        header("Location: /auth/login");
        exit;
    }
    
}
