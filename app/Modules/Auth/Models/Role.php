<?php
namespace App\Modules\Auth\Models;
use App\Core\Models\Module;
/**
 * Role Model (A Role has many Permissions and is derived from a BaseRole)
 * The Role model has a many-to-many relationship with the Permission model via the role_permissions pivot table.
 * The role_permissions table links roles and permissions together, storing which permissions belong to which roles.
 */
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
        protected $table = 'auth_roles';

    protected $fillable = ['name', 'base_role_id', 'scope'];

    // If you have a "base role" concept, keep it as is
    public function baseRole()
    {
        return $this->belongsTo(Role::class, 'base_role_id');
    }

    // If your pivot is named something else (e.g. role_permissions), adjust accordingly // Linking to permissions:
    public function permissions()
    {
        return $this->belongsToMany(
            Permission::class,         // The Permission model
            'auth_role_permissions',   // The pivot table
            'role_id',                 // The pivot column that references auth_roles.id
            'permission_id'            // The pivot column that references auth_permissions.id
        );
    }

    public function modules()
{
    return $this->belongsToMany(
        Module::class,
        'auth_role_module',
        'role_id',   // pivot column referencing roles.id
        'module_id', // pivot column referencing modules.id
    )->withPivot('allowed');
}

    // MANY-TO-MANY RELATIONSHIP
    public function users()
{
    // same pivot table, but foreign keys reversed
    return $this->belongsToMany(User::class, 'auth_user_roles', 'role_id', 'user_id');
}

}