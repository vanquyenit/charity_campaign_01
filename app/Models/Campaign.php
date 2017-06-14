<?php

namespace App\Models;

use App\QueryFilter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Nicolaslopezj\Searchable\SearchableTrait;

class Campaign extends Model
{
    use SearchableTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address',
        'lat',
        'lng',
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    public $ruleImage = [
        'upload' => 'required|image|mimes:jpg,jpeg,JPEG,png,gif', 'max:2024',
    ];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [

        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'campaigns.name' => 10,
            'campaigns.address' => 10,
        ],
    ];

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function owner()
    {
        return $this->hasOne(UserCampaign::class);
    }

    public function contributions()
    {
        return $this->hasMany(Contribution::class);
    }

    public function timelines()
    {
        return $this->hasMany(Timeline::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function userCampaigns()
    {
        return $this->hasMany(UserCampaign::class);
    }

    public function categoryCampaign()
    {
        return $this->hasMany(CategoryCampaign::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function actions()
    {
        return $this->morphMany(Action::class, 'actionable');
    }

    public function countComment($id)
    {
        return Comment::where('campaign_id', $id)->count();
    }

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function campaign($id)
    {
        return Campaign::with('image')
            ->with('owner.user')
            ->find($id);
    }

    public function checkMemberOfCampaignByUserId($userId)
    {
        return $this->userCampaigns->pluck('id', 'user_id')->has($userId);
    }

    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }

    public function getDescriptionAttribute($value)
    {
        if (empty($value)) {
            return false;
        }

        return str_limit($value, config('constants.LIMIT_DESCRIPTION_CHARACTERS'));
    }

    public function trimName()
    {
        return str_limit($this->name, config('constants.LIMIT_TITLE_CHARACTERS'));
    }

    public function trimDescription()
    {
        return str_limit($this->description, config('constants.LIMIT_TITLE_CHARACTERS'));
    }

    public function timeHours($param)
    {
        return date('h:i A', strtotime($this->$param));
    }

    public function timeDay($param)
    {
        return date('D , F d , Y', strtotime($this->$param));
    }
}
