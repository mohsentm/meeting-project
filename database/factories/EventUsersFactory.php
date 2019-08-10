<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\EventUsers;
use App\Models\Event;
use App\Models\User;

$factory->define(EventUsers::class, static function () {
    return [
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
        'event_id' => static function () {
            return factory(Event::class)->create()->id;
        },
        'status' => EventUsers::ACTIVATED
    ];
});
