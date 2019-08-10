<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Services\EventService;
use\Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    private $eventService;

    public function __construct(EventService $eventServices)
    {
        $this->eventService = $eventServices;
    }

    /**
     * @param EventRequest $eventRequest
     * @return JsonResponse
     */
    public function index(EventRequest $eventRequest): JsonResponse
    {
        return Response()->json($this->eventService->index($eventRequest->all()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EventRequest $eventRequest
     * @return JsonResponse
     */
    public function store(EventRequest $eventRequest): JsonResponse
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        return Response()->json($this->eventService->show($id));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  EventRequest $eventRequest
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(EventRequest $eventRequest, $id): JsonResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {

    }
}
