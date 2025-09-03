<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type_id',
        'title',
        'description',
        'sprint',
        'content',
        'user_id',
    ];

    /**
     * Get the type associated with the note.
     */
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    /**
     * Get the user that owns the note.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
