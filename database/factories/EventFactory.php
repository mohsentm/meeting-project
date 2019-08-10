<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\Models\Event;
use App\Models\User;
use Faker\Generator as Faker;
use App\Repositories\EventRepository;
use Grimzy\LaravelMysqlSpatial\Types\Point;


$factory->define(Event::class, static function (Faker $faker) {
    $startDate = $faker->dateTimeBetween('-3 days', '+10 months');
    $endDate = $faker->dateTimeInInterval($startDate, '+3 days');

    return [
        'user_id' => static function () {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence(),
        'description' => $faker->paragraphs($faker->numberBetween(2, 5), true),
        'start_time' => $startDate,
        'end_time' => $endDate,
        'image' => $faker->image(EventRepository::storagePath(), 400, 300, 'technics', false),
        'capacity' => $faker->numberBetween(10, 99999),
        'price' => $faker->numberBetween(0, 99999),
        'location' => new Point($faker->latitude, $faker->longitude),
        'status' => $endDate->diff(Carbon::now())->invert === 1
            ? $faker->randomElement([Event::ENABLE, Event::PENDING])
            : Event::FINISHED
    ];
});
