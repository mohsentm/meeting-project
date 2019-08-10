<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class EventUsers
 * @package App\Models
 * @property integer $id
 * @property int $user_id
 * @property int $event_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon $deleted_at
 * @property-read User $user
 * @property-read Event $event
 */
class EventUsers extends Model
{
    public const PENDING = 'PENDING';
    public const ACTIVATED = 'ACTIVATED';
    public const CANCELED = 'CANCELED';
    public const STATUS = [self::PENDING, self::ACTIVATED, self::CANCELED];

    protected $table = 'event_users';

    protected $fillable = [
        'user_id', 'event_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
