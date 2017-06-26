<?php
namespace App\Repositories\Participant;

use App\Models\Participant;
use App\Repositories\BaseRepository;
use App\Repositories\Participant\ParticipantRepositoryInterface;

class ParticipantRepository extends BaseRepository implements ParticipantRepositoryInterface
{
    public function model()
    {
        return Participant::class;
    }

    public function listUser()
    {

        $friend = $this->model->where('user_id', auth()->id())->get();
        $thread = [];

        foreach ($friend as $value) {
            $thread[] = $value->thread_id;
        }

        return $this->model->with('user')
            ->whereIn('thread_id', $thread)
            ->groupBy('user_id')
            ->where('user_id', '<>', auth()->id())
            ->orderBy('updated_at', 'DESC')
            ->get();
    }
}
