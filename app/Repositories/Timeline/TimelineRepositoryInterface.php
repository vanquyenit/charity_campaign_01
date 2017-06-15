<?php
namespace App\Repositories\Timeline;

interface TimelineRepositoryInterface
{
    public function getTimeline($idUser);

    public function createTimeline($params = []);
}
