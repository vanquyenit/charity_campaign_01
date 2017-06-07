<?php
namespace App\Repositories\Event;

interface EventRepositoryInterface
{
    public function getUpcoming();

    public function getHappening();

    public function getExpired();
}
