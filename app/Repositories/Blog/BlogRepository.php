<?php
namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use DB;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function model()
    {
        return Blog::class;
    }

    public function createBlog($params = [])
    {
        if (empty($params)) {
            return false;
        }

        if ($params['type'] == 'image') {
            DB::beginTransaction();

            try {
                foreach ($params['img'] as $key => $value) {
                    $image = $this->uploadImage($value, config('path.images'));
                    $blog = $this->model->create([
                        'title' => $params['title'],
                        'content' => $image,
                        'type' => $params['type'],
                    ]);
                }

                DB::commit();

                return $blog;
            } catch (Exception $e) {
                DB::rollBack();

                return false;
            }
        } else {
            return $this->model->create([
                'title' => $params['title'],
                'content' => $params['video'],
                'type' => $params['type'],
            ]);
        }
    }
}
