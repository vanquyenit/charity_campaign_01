<?php

namespace App\Models;

use App\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = [
        'name',
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
