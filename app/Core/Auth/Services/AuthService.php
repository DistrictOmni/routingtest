<?php

namespace App\Core\Auth\Services;

use App\Core\Auth\Models\User;
use App\Core\Database\Database;
use PDO;

/**
 * Auth Service
 * /app/Core/Auth/Services/AuthService.php
 * 
 * This service handles user authentication logic.
 * 
 */

class AuthService
{
    protected Database $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Register a new user
     */
    public function registerUser(array $data): bool
    {
        // Example logic: hash password, insert into DB
        $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

        $sql  = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->db->getConnection()->prepare($sql);
        return $stmt->execute([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => $hashedPassword
        ]);
    }

    /**
     * Login a user by checking credentials
     */
    public function loginUser(array $credentials): ?User
    {
        $sql  = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute(['email' => $credentials['email']]);
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row && password_verify($credentials['password'], $row['password'])) {
            // Return a User instance on successful login
            return new User(
                $row['id'],
                $row['name'],
                $row['email'],
                $row['password']
            );
        }

        return null;
    }

    /**
     * Logout a user
     */
    public function logoutUser(): void
    {
        // Example logic: clear session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
    }
}
