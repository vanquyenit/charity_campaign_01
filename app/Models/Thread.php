<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject'];

    /**
     * Get all of the owning actionable models.
     */
    public function chats()
    {
        return $this->hasMany(Chat::class, 'thread_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'thread_id', 'user_id');
    }

    public function participants()
    {
        return $this->hasMany(Participant::class);
    }
}
