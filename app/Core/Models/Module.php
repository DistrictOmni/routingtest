<?php
namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    // Adjust to match your actual table name if needed
    protected $table = 'core_modules';

    // Add columns you want to fill
    protected $fillable = ['name'];
}
