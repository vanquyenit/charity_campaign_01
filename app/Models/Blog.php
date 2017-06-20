<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'type',
        'user_id',
    ];

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }

    public function contentPath()
    {
        return asset('uploads/images/' . $this->content);
    }
}
