<?php
namespace App\Repositories\Event;

interface EventRepositoryInterface
{
    public function getUpcoming();

    public function getHappening();

    public function getExpired();

    public function getDetail($id);

    public function createEvent($params = []);

    public function listEventOfUser($userId);

    public function deleteEvent($eventId);
}
