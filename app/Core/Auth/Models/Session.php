<?php

namespace App\Modules\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'auth_sessions';

    protected $fillable = [
        'user_id',
        'jti',
        'ip_address',
        'user_agent',
        'created_at',
        'expires_at'
    ];

    public $timestamps = false;
}
