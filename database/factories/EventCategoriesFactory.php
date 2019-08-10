<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EventCategories;
use App\Models\Event;
use App\Models\Category;

$factory->define(EventCategories::class, static function () {
    return [
        'event_id' => static function () {
            return factory(Event::class)->create()->id;
        },
        'category_id' => static function () {
            return factory(Category::class)->create()->id;
        },
    ];
});
