<?php
namespace App\Modules\Auth\Models;
use App\Core\Models\Module;
/**
 * Permission Model (A Permission belongs to many Roles)
 * The Permission model defines the inverse of the relationship, where a Permission can belong to many Roles via the role_permissions table.
 * 
 */


use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    // This points to the auth_permissions table
    protected $table = 'auth_permissions';

    protected $fillable = ['name', 'description'];

    // A permission can belong to many roles via auth_role_permissions pivot
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,               // Related model
            'auth_role_permissions',   // Pivot table
            'permission_id',           // FK on pivot referencing permissions table
            'role_id'                  // FK on pivot referencing roles table
        );
    }

    public function module()
{
    return $this->belongsTo(Module::class, 'module_id');
}
}
