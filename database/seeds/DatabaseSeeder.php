<?php

use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use App\Models\UserItem;
use App\Models\Diary;
use App\Models\Wallet;

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
      for ($i = 0; $i < 20; $i++) {
        factory(Item::class)->create();
      }

      for ($i = 0; $i < 20; $i++) {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $user_item = factory(UserItem::class)->create(
          ['user_id' => $user->id, 'item_id' => $item->id]);
        $wallet = factory(Wallet::class)->create(['user_id' => $user->id]);
        $wallet = factory(Diary::class)->create(['user_id' => $user->id]);
      }
    }
}
