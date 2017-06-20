<?php

namespace App\Models;

use App\QueryFilter;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'fullname',
        'email',
        'subject',
        'message',
        'review',
        'role',
    ];

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
