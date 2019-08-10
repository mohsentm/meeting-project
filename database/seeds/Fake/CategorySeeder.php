<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Category;

class CategorySeeder extends Seeder
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

        factory(Category::class, 4)->create()->each(static function (Category $category) use($faker) {
           factory(Category::class, $faker->numberBetween(0, 4))->create(['parent_id' => $category->id]);
        });
    }
}
