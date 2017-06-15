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
        return $this->model->with('user')->where('user_id', $userId)->get();
    }

    public function createTimeline($params = [])
    {
        if (empty($params)) {
            return false;
        }

        switch ($params) {
            case isset($params['blog_id']):
                $params = [
                    'blog_id' => $params['blog_id'],
                    'data_type' => config('settings.blog'),
                ];
                break;

            case isset($params['event_id']):
                $params = [
                    'event_id' => $params['event_id'],
                    'data_type' => config('settings.event'),
                ];
                break;

            case isset($params['campaign_id']):
                $params = [
                    'campaign_id' => $params['campaign_id'],
                    'data_type' => config('settings.campaign'),
                ];
                break;

            default:
                $params = [
                    'friends_id' => $params['friends_id'],
                    'data_type' => $params['data_type'],
                ];
                break;
        }

        $params['user_id'] = auth()->id();

        return $this->model->create($params);
    }
}
