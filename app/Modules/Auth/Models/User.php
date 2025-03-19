<?php
namespace App\Modules\Auth\Models;

use App\Modules\Auth\Models\Role;
use App\Modules\Auth\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class User extends Model
{
    protected $table = 'auth_users';
    protected $fillable = ['email', 'password', 'role_id'];


    // Hash the password before saving
    public static function boot()
    {
        parent::boot();
        static::saving(function ($user) {
            if ($user->isDirty('password')) {
                $user->password = Hash::make($user->password);
            }
        });
    }

        // MANY-TO-MANY RELATIONSHIP
        public function roles()
        {
            // 'user_roles' is your pivot table
            // 'user_id' is the foreign key in 'user_roles' that references users
            // 'role_id' is the foreign key in 'user_roles' that references roles
            return $this->belongsToMany(Role::class, 'auth_user_roles', 'user_id', 'role_id');
        }
        

    /**
     * Example method to get permissions for the user.
     */
    public function getPermissions()
    {
        return $this->hasMany(Permission::class, 'user_id');
    }

    // Attempt to authenticate a user based on email and password
    public static function authenticate($email, $password)
    {
        $user = self::where('email', $email)->first();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
    
    public function canAccessModule($moduleIdOrSlug)
{
    // fetch all the user's roles, gather all the modules for each role
    foreach ($this->roles as $role) {
        foreach ($role->modules as $mod) {
            // Check if we match the ID or slug, AND pivot->allowed is 1
            if (
                ($mod->id == $moduleIdOrSlug || $mod->slug == $moduleIdOrSlug) &&
                $mod->pivot->allowed == 1
            ) {
                return true;
            }
        }
    }
    return false;
}

}
