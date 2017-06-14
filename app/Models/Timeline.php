<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'campaign_id',
        'event_id',
        'blog_id',
        'friends_id',
        'data_type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friends_id');
    }

    public function getCreatedAtAttribute($value)
    {
        if (empty($value)) {
            return false;
        }

        return Carbon::now()->subSeconds(time() - strtotime($value))->diffForHumans();
    }
}
