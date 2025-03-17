<?php

namespace App\Core\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'core_modules';

    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
?>
