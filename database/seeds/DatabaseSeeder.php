<?php

use Illuminate\Database\Seeder;
use App\Models\Item;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker\Factory::create();
      for ($i = 0; $i < 10; $i++) {
        $user = Item::create(array(
            'name' => $faker->word,
            'description' => $faker->sentence,
            'weight' => $faker->numberBetween($min = 1, $max = 20)
        ));
      }
    }
}
