<?php
namespace App\Repositories\Comment;

interface CommentRepositoryInterface
{
    public function createComment($params = []);

    public function getTotalCommentByCampaign($column, $id);
}
