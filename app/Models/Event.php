<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'content',
        'img',
        'campaign_id',
        'user_id',
        'address',
        'lat',
        'lng',
        'start_time',
        'end_time',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }

    public function imgPath()
    {
        return asset('uploads/images/' . $this->img);
    }

    public function timeDay($param)
    {
        return date('D , F d , Y', strtotime($this->$param));
    }

    public function countTimer($value)
    {
        if (empty($value)) {
            return false;
        }

        return Carbon::now()->subSeconds(time() - strtotime($this->$value))->diffForHumans();
    }
}
