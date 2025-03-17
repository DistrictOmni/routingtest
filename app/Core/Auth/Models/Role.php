<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'auth_roles';

    public function modules()
    {
        return $this->belongsToMany(Module::class, 'role_module_access')
                    ->withPivot('has_access');
    }
}
?>
