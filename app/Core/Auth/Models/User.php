<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * User Model
 * /app/Core/Auth/Models/User.php
 * 
 * This model represents a user in the system.
 * 
 */
class User extends Model
{
    protected $table = 'users'; // If the table name differs from default 'users'.
    
    // Optionally define which fields can be mass-assigned:
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    // If you use a different primary key field:
    // protected $primaryKey = 'id';
    
    // Eloquent already provides get/set methods.
    // Additional logic or relationships can be added here.
}
