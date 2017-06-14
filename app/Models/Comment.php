<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'campaign_id',
        'name',
        'email',
        'text',
        'event_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        if (empty($value)) {
            return false;
        }

        return Carbon::now()->subSeconds(time() - strtotime($value))->diffForHumans();
    }
}
