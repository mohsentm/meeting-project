<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Location;

/**
 * Class Event
 * @package App\Models
 * @property integer $id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property Carbon $start_time
 * @property Carbon $end_time
 * @property string $image
 * @property integer $capacity
 * @property integer $price
 * @property Location $location
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read User $user
 * @property-read EventUsers[] $eventUsers
 */
class Event extends Model
{
    use SoftDeletes;

    public const PENDING = 'PENDING';
    public const ENABLE = 'ENABLE';
    public const FINISHED = 'FINISHED';

    public const STATUS = [self::PENDING, self::ENABLE, self::FINISHED];

    protected $table = 'events';

    protected $fillable = [
        'user_id', 'title', 'description', 'start_time', 'end_time',
        'image', 'capacity', 'price', 'location', 'status'
    ];
    protected $dates = ['start_time', 'end_time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventUsers()
    {
        return $this->hasMany(EventUsers::class);
    }
}
