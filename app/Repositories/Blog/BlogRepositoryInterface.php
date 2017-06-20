<?php
namespace App\Repositories\Blog;

interface BlogRepositoryInterface
{
    public function createBlog($params = []);

    public function listBlogOfUser($userId);

    public function deleteBlog($blogId);
}
