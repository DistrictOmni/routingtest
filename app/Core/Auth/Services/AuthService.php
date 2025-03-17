<?php

namespace App\Core\Auth\Services;

use App\Core\Auth\Models\User;
use App\Core\Auth\Models\Session;
use Firebase\JWT\JWT;
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;

class AuthService
{
    private string $jwtSecret = 'your_secret_key'; // Move to .env in production

    /**
     * Attempt to log in by checking credentials and returning a JWT.
     */
    public function attemptLogin(string $email, string $password, string $userAgent, string $ipAddress): array
    {
        // 1. Retrieve user by email (use Eloquent instead of raw SQL)
        $user = User::where('email', $email)->first();

        if (!$user || !password_verify($password, $user->password)) {
            throw new Exception("Incorrect email or password.");
        }

        // 2. Generate JWT
        $jti = Str::random(32);
        $expiresAt = time() + 3600; // 1 hour expiry

        $payload = [
            'sub' => $user->id,
            'jti' => $jti,
            'exp' => $expiresAt,
        ];

        $jwt = JWT::encode($payload, $this->jwtSecret, 'HS256');

        // 3. Store JWT in `sessions` table
        Session::create([
            'user_id'    => $user->id,
            'jti'        => $jti,
            'ip_address' => $ipAddress,
            'created_at' => Carbon::now(),
            'expires_at' => Carbon::now()->addHour(),
        ]);

        // 4. Return the JWT token
        return [
            'token'      => $jwt,
            'expires_at' => $expiresAt
        ];
    }

    /**
     * Logout a user by deleting the session (revoking token)
     */
    public function logoutUser(?string $jti = null): void
    {
        if ($jti) {
            Session::where('jti', $jti)->delete();
        }
    }
}
