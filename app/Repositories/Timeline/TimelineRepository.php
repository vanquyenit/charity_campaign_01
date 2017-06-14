<?php
namespace App\Repositories\Timeline;

use App\Models\Timeline;
use App\Repositories\BaseRepository;
use App\Repositories\Timeline\TimelineRepositoryInterface;

class TimelineRepository extends BaseRepository implements TimelineRepositoryInterface
{

    public function model()
    {
        return Timeline::class;
    }

    public function getTimeline($userId)
    {
        return Timeline::with('user')->where('user_id', $userId)->get();
    }
}
