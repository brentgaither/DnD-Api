<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use App\Models\UserItem;

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
      $faker = Faker\Factory::create();
      for ($i = 0; $i < 10; $i++) {
        $user = User::create(array(
            'name' => $faker->word,
            'email' => $faker->email,
        ));
      }
      $faker = Faker\Factory::create();
      for ($i = 0; $i < 10; $i++) {
        $user = UserItem::create(array(
            'user_id' => $faker->numberBetween($min = 1, $max = 10),
            'item_id' => $faker->numberBetween($min = 1, $max = 10),
            'quantity' => $faker->numberBetween($min = 1, $max = 10)
        ));
      }
    }
}
