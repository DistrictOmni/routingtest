<?php

namespace App\Core\Auth\Services;

use App\Core\Auth\Models\User;
use App\Core\Auth\Models\Session;
use Firebase\JWT\JWT;
use Illuminate\Support\Str;
use Exception;
use Carbon\Carbon;
use App\Core\Database\Database;

class AuthService
{
    private string $jwtSecret;
    protected Database $db;

    // Define a constructor that expects a Database instance
    public function __construct(Database $db)
    {
        $this->db = $db;
// AuthService.php
$this->jwtSecret = 'my_super_secret_key';

    }
    /**
     * Attempt to log in by checking credentials and returning a JWT.
     */
    public function attemptLogin()
    {
        // 1) Read form data
        $email = $_POST['email'] ?? null;
        $password = $_POST['password'] ?? null;

        if (!$email || !$password) {
            http_response_code(400);
            echo json_encode(['error' => 'Email and password are required.']);
            exit;
        }

        try {
            // 2) AuthService returns ['token' => ..., 'expires_at' => ...]
            $tokenData = $this->attemptLoginWithCredentials(
                $email,
                $password,
                $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
                $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0'
            );

            // 3) Return token + expiry in JSON
            header('Content-Type: application/json');
            echo json_encode([
                'token'      => $tokenData['token'],
                'expires_at' => $tokenData['expires_at'],
            ]);
            exit;

        } catch (Exception $e) {
            http_response_code(401);
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }

    /**
     * Attempt to log in with credentials and return a JWT.
     */
    public function attemptLoginWithCredentials(string $email, string $password, string $userAgent, string $ipAddress): array
    {
        // Your logic to authenticate the user and generate JWT token
        // This is a placeholder implementation
        $user = User::where('email', $email)->first();

        if (!$user || !password_verify($password, $user->password)) {
            throw new Exception('Invalid credentials.');
        }

        $payload = [
            'iss' => 'your-issuer', // Issuer
            'sub' => $user->id, // Subject
            'iat' => time(), // Issued at
            'exp' => time() + 3600, // Expiration time
            'jti' => Str::uuid()->toString(), // JWT ID
            'user_agent' => $userAgent,
            'ip_address' => $ipAddress,
        ];

        $token = JWT::encode($payload, $this->jwtSecret, 'HS256');

        // Assuming expires_at is a string in your response, use Carbon to get a timestamp
        $expiresAtTimestamp = Carbon::createFromTimestamp($payload['exp'])->timestamp;
    
        // Save the session in the database
        Session::create([
            'user_id' => $user->id,
            'jti' => $payload['jti'],
            'ip_address' => $ipAddress,
            'user_agent' => $userAgent,
            'expires_at' => Carbon::createFromTimestamp($payload['exp'])->toDateTimeString(),
        ]);

        return [
            'token' => $token,
            'expires_at' => Carbon::createFromTimestamp($payload['exp'])->toDateTimeString(),
            'expires_at_timestamp' => $expiresAtTimestamp,  // Add this line
            'user_id' => $user->id,  // Add this line
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
