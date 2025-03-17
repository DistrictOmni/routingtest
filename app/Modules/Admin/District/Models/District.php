<?php

namespace App\Modules\Admin\District\Models;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The table associated with the model.
     * By default, Eloquent will guess the table as "districts"
     * if your model is named "District." Only override if needed.
     */
    protected $table = 'core_districts';

    /**
     * The attributes that are mass assignable.
     * Adjust this list to match the actual columns in your "districts" table.
     */
    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'website',
        // ... any other columns ...
    ];

    /**
     * If the table has created_at and updated_at columns, Eloquent will
     * automatically maintain them. If not, set public $timestamps = false;
     */
    // public $timestamps = false;

    /**
     * Example of a relationship: one district might have many schools.
     */
    public function schools()
    {
        return $this->hasMany(School::class);  // Adjust App\Models\School if needed
    }

    /**
     * Another possible example: a district might have many staff or district-level administrators.
     */
    public function staff()
    {
        return $this->hasMany(User::class, 'district_id'); // If your users table references district_id
    }

    // Additional relationships or model logic as needed...
}
