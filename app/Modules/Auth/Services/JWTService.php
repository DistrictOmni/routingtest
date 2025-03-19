<?php

namespace App\Modules\Auth\Services;

use Firebase\JWT\JWT;
use App\Modules\Auth\Models\User;
use App\Modules\Auth\Models\Role;

class JWTService
{
    private static $key = 'your-secret-key';

    public static function generateToken(User $user)
    {
        // Include roles and scopes in the payload
        $roles = $user->roles->map(function ($role) {
            return [
                'role' => $role->name,
                'permissions' => $role->permissions->pluck('name'),
                'scope' => $role->scope,
            ];
        });

        $payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + 3600,
            'roles' => $roles,
        ];

        return JWT::encode($payload, self::$key);
    }

    public static function validateToken($token)
    {
        try {
            return JWT::decode($token, self::$key, ['HS256']);
        } catch (\Exception $e) {
            return null;
        }
    }
}
