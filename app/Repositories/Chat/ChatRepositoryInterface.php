<?php
namespace App\Repositories\Chat;

interface ChatRepositoryInterface
{
    public function getMessage($threadId);
}
