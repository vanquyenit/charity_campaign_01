<?php
namespace App\Repositories\Event;

use App\Models\Event;
use App\Repositories\BaseRepository;
use App\Repositories\Event\EventRepositoryInterface;
use DB;
use File;
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
            'user_id' => auth()->id(),
            'address' => $params['address'],
            'lat' => $params['lattitude'],
            'lng' => $params['longitude'],
            'start_time' => $params['start_date'],
            'end_time' => $params['end_date'],
        ]);
    }

    public function updateEvent($params = [])
    {

        if (empty($params)) {
            return false;
        }

        $event = $this->model->find($params['event_id']);

        if (!$event) {
            return false;
        }

        if (empty($params['file'])) {
            unset($params['file']);
        } else {
            File::delete(config('path.images') . $event->img);
            $image = $this->uploadImage($params['file'], config('path.images'));
            $event->img = $image;
        }

        DB::beginTransaction();
        try {
            $event->title = $params['name'];
            $event->description = $params['description'];
            $event->content = $params['content'];
            $event->address = $params['address'];
            $event->lat = $params['lattitude'];
            $event->lng = $params['longitude'];
            $event->start_time = $params['start_date'];
            $event->end_time = $params['end_date'];
            $event->save();

            DB::commit();

            return $event;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }

    public function listEventOfUser($userId)
    {
        if (!$userId) {
            return false;
        }

        return $this->model->where('user_id', $userId);
    }

    public function deleteEvent($eventId)
    {
        if (!$eventId) {
            return false;
        }

        $event = $this->model->find($eventId);

        DB::beginTransaction();
        try {
            if (!empty($event->img)) {
                File::delete(config('path.images') . $event->img);
            }

            $event->delete();

            DB::commit();

            return $event;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
