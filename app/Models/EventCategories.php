<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EventCategories
 * @package App\Models
 * @property integer $event_id
 * @property integer $category_id
 */
class EventCategories extends Model
{
    protected $table = 'event_categories';
}
