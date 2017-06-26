<?php
namespace App\Repositories\Hashtag;

use App\Models\Hashtag;
use App\Repositories\BaseRepository;
use App\Repositories\Hashtag\HashtagRepositoryInterface;

class HashtagRepository extends BaseRepository implements HashtagRepositoryInterface
{

    public function model()
    {
        return Hashtag::class;
    }
}
