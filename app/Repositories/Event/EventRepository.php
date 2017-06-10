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
            ->orderBy('id', 'desc')
            ->paginate(config('constants.LIMIT_EVENT'));
    }

    public function getHappening()
    {
        return Event::where('start_time', '>=', Carbon::now()->toDateString() . ' 00:00:00')
            ->where('start_time', '<=', Carbon::now()->toDateString() . ' 23:59:59')
            ->orderBy('id', 'desc')
            ->paginate(config('constants.LIMIT_EVENT'));
    }

    public function getExpired()
    {
        return Event::where('start_time', '<', Carbon::now())
            ->orderBy('id', 'desc')
            ->paginate(config('constants.LIMIT_EVENT'));
    }

    public function getDetail($id)
    {
        if (!$id) {
            return false;
        }

        return $this->model->with('comments.user')->find($id);
    }

    public function getEvent($id)
    {
        if (!$id) {
            return false;
        }

        return Event::where('campaign_id', $id)->get();
    }

    public function createEvent($params = [])
    {

        if (empty($params)) {
            return false;
        }
        $image = $this->uploadImage($params['image'], config('path.images'));

        return $this->model->create([
            'title' => $params['name'],
            'description' => $params['description'],
            'content' => $params['content'],
            'img' => $image,
            'campaign_id' => $params['campaign_id'],
            'address' => $params['address'],
            'lat' => $params['lattitude'],
            'lng' => $params['longitude'],
            'start_time' => $params['start_date'],
            'end_time' => $params['end_date'],
        ]);
    }
}
