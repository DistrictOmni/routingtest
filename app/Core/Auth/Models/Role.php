<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
 protected $table = 'auth_roles';

    // For mass assignment, you can specify fillable fields:
    protected $fillable = ['name', 'guard_name'];

    // If you have a "permissions" relationship, you might do something like:
    // public function permissions()
    // {
    //     return $this->belongsToMany(Permission::class);
    // }
}
