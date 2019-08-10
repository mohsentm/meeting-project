<?php

use App\Models\User;
use App\Models\Category;
use App\Models\EventUsers;
use App\Models\EventCategories;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var  $faker */
        $faker = resolve(Faker::class);
        /** @var  $user */
        $user = resolve(User::class);
        /** @var  $category */
        $category = resolve(Category::class);

        factory(Event::class, 10)->create([
            'user_id' => $user->inRandomOrder()->first()->id
                ?? factory(User::class)->create()->id
        ])->each(static function (Event $event) use ($faker, $user, $category) {

            factory(EventUsers::class, $faker->numberBetween(1, 4))->create([
                'event_id' => $event->id,
                'user_id' => $user->where('id', '!=', $event->user_id)->inRandomOrder()->first()->id
                    ?? factory(User::class)->create()->id
            ]);

            factory(EventCategories::class)->create([
                'event_id' => $event->id,
                'category_id' => $category->inRandomOrder()->first()->id
                    ?? factory(Category::class)->create()->id
            ]);

        });
    }
}
