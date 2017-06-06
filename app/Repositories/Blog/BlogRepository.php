<?php
namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepository;
use App\Repositories\Blog\BlogRepositoryInterface;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function model()
    {
        return Blog::class;
    }
}
