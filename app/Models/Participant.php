<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'thread_id',
        'user_id',
        'last_read',
    ];

    public function threads()
    {
        return $this->hasMany(Thread::class, 'thread_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
