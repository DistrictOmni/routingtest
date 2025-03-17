<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'auth_user_roles';

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
?>
