<?php

namespace App\Repositories;

use App\Models\Event;

/**
 * Class EventRepository
 * @package App\Repositories\InstagramRepositories
 * @property BigInteger $id
 * @property string $title
 * @property string $description
 * @property timestamp $start_time
 * @property timestamp $end_time
 * @property string $image
 * @property integer $price
 * @property point $location
 * @property string $status
 */
class EventRepository extends BaseRepository
{
    /** @var string */
    public const STATUS_ENABLE = 'ENABLE';
    /** @var string */
    public const STATUS_FINISHED = 'FINISHED';
    /** @var string  */
    public const STATUS_PENDING = 'DISABLE';
    /** @var array */
    public const STATUS_LIST = [self::STATUS_ENABLE, self::STATUS_FINISHED, self::STATUS_PENDING];
    /** @var string */
    public const DEFAULT_STATUS = self::STATUS_PENDING;

    /**
     * @return mixed|string
     */
    public function model()
    {
        return Event::class;
    }
}
