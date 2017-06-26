<?php
namespace App\Repositories\Chat;

use App\Models\Chat;
use App\Repositories\BaseRepository;
use App\Repositories\Chat\ChatRepositoryInterface;

class ChatRepository extends BaseRepository implements ChatRepositoryInterface
{
    public function model()
    {
        return Chat::class;
    }

    public function getMessage($threadId)
    {
        return $this->model->with('user')
            ->where('thread_id', $threadId)
            ->get();
    }
}
