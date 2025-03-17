<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $table = 'auth_access_log';

    protected $fillable = [
        'username',
        'profile',
        'ip_address',
        'user_agent',
        'status',
        'created_at'
    ];
}
