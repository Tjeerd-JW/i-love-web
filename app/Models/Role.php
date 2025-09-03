<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Specify the table if it doesn't follow Laravel's naming convention
    protected $table = 'roles';

    // Define the relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class, 'role_id'); // 'roleID' is the foreign key in the users table
    }
}
