<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App\Models
 * @property integer $id
 * @property integer $parent_id
 * @property string $title
 */
class Category extends Model
{
    protected $table = 'categories';

}
