<?php
namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepository;
use App\Repositories\Blog\BlogRepositoryInterface;
use DB;
use File;

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
                $img = [];
                foreach ($params['img'] as $key => $value) {
                    $image = $this->uploadImage($value, config('path.images'));
                    $img[] = $image;
                }
                $blog = $this->model->create([
                    'title' => $params['title'],
                    'content' => json_encode($img),
                    'type' => $params['type'],
                    'user_id' => auth()->id(),
                ]);

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
                'user_id' => auth()->id(),
            ]);
        }
    }

    public function listBlogOfUser($userId)
    {
        if (!$userId) {
            return false;
        }

        return $this->model->where('user_id', $userId)->orderBy('id', 'desc')->get();
    }

    public function listImageOfUser($userId)
    {
        if (!$userId) {
            return false;
        }

        return $this->model->where('user_id', $userId)
            ->where('type', 'image')->orderBy('id', 'desc')->first();
    }

    public function deleteBlog($blogId)
    {
        if (!$blogId) {
            return false;
        }
        $blog = $this->model->find($blogId);

        if (!$blog) {
            return false;
        }

        DB::beginTransaction();
        try {
            if ('image' == $blog->type) {
                $arrayImage = json_decode($blog->content);
                foreach ($arrayImage as $key => $value) {
                    File::delete(config('path.images') . $value);
                }
            }

            $blog->delete();

            DB::commit();

            return $blog;
        } catch (Exception $e) {
            DB::rollBack();

            return false;
        }
    }
}
