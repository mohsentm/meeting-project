<?php

namespace App\Services;

use App\Repositories\EventRepository;

class EventService
{
    private $eventRepository;

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * @param array $data
     * @return EventRepository
     */
    public function index(array $data = [])
    {
        return $this->eventRepository->events($data);
    }

    /**
     * @param int $id
     * @return EventRepository
     */
    public function show(int $id)
    {
        return $this->eventRepository->findEvent($id);
    }
}
