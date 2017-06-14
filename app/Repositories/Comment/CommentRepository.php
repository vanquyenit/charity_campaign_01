<?php
namespace App\Repositories\Comment;

use App\Models\Comment;
use App\Repositories\BaseRepository;
use App\Repositories\Comment\CommentRepositoryInterface;
use Auth;
use Illuminate\Container\Container;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    protected $container;

    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function model()
    {
        return Comment::class;
    }

    public function createComment($params = [])
    {
        if (empty($params)) {
            return false;
        }

        if (is_null($params['campaign_id'])) {
            return $this->model->create([
                'name' => $params['name'],
                'email' => $params['email'],
                'user_id' => auth()->id(),
                'campaign_id' => null,
                'event_id' => $params['event_id'],
                'text' => $params['text'],
            ]);
        } else {
            return $this->model->create([
                'name' => $params['name'],
                'email' => $params['email'],
                'user_id' => auth()->id(),
                'campaign_id' => $params['campaign_id'],
                'event_id' => null,
                'text' => $params['text'],
            ]);
        }
    }

    public function getDetail($id)
    {
        if (!$id) {
            return false;
        }

        return $this->model->with('user')->find($id);
    }

    public function getTotalCommentByCampaign($column, $id)
    {
        if (!$id) {
            return false;
        }

        return $this->model->where($column, $id)->count();
    }
}
