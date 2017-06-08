<?php
namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\BaseRepository;
use App\Repositories\Event\EventRepositoryInterface;
use \Carbon\Carbon;

class EventRepository extends BaseRepository implements EventRepositoryInterface
{

    public function model()
    {
        return Event::class;
    }

    public function getUpcoming()
    {
        return Event::where('start_time', '>=', Carbon::now())
            ->paginate(config('constant.LIMIT_EVENT'));
    }

    public function getHappening()
    {
        return Event::where('start_time', '>=', Carbon::now()->toDateString() . ' 00:00:00')
            ->where('start_time', '<=', Carbon::now()->toDateString() . ' 23:59:59')
            ->paginate(config('constant.LIMIT_EVENT'));
    }

    public function getExpired()
    {
        return Event::where('start_time', '<', Carbon::now())
            ->paginate(config('constant.LIMIT_EVENT'));
    }

    public function getDetail($id)
    {
        if (!$id) {
            return false;
        }

        return $this->model->with('comments.user')->find($id);
    }
}
