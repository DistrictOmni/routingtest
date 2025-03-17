<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    protected $table = 'auth_user_permissions';

    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
?>
