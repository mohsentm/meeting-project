<?php

namespace App\Repositories;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;
use Carbon\Carbon;
use Grimzy\LaravelMysqlSpatial\Types\Point;

/**
 * Class EventRepository
 * @package App\Repositories\InstagramRepositories
 * @property integer $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property string $image
 * @property integer $capacity
 * @property integer $price
 * @property Point $location
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 */
class EventRepository extends BaseRepository
{
    /** @var int default per page limit */
    public const PER_PAGE = 2;
    /** @var string event files directory */
    public const DIR_PATH = 'events';

    /**
     * @return mixed|string
     */
    public function model()
    {
        return Event::class;
    }

    public function events(array $data = [])
    {
        $events = $this->query->with(['user:id,name', 'categories:id,title'])
            ->paginate($data['per_page'] ?? self::PER_PAGE)
            ->appends($data);

        $events->transform(static function ($event) {
            $event->image = self::imageAsset($event->image);
            $event->capacity -= $event->eventUsers->count();
            return $event;
        });
        return $events;
    }

    public function findEvent(int $eventId)
    {
        $event = $this->query->with(['user:id,name', 'categories:id,title'])
            ->findOrFail($eventId);

        $event->image = self::imageAsset($event->image);
        $event->capacity -= $event->eventUsers->count();

        return $event;
    }

    /**
     * return the public link
     * @param string $image
     * @return string
     */
    public static function imageAsset(string $image): string
    {
        return Storage::url(self::DIR_PATH . '/' . $image);
    }

    /**
     * return the event images storage path
     * @return string
     */
    public static function storagePath(): string
    {
        return storage_path('app/public/' . self::DIR_PATH);
    }
}
