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
      DB::table('items')->insert([
        [ 'name' =>'Abacus', 'cost' =>2, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Acid (vial)', 'cost' =>25, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Alchemist\'s fire (flask)', 'cost' =>50, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Amulet', 'cost' =>5, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Antitoxin (vial)', 'cost' =>50, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Arrows (20)', 'cost' =>1, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Backpack', 'cost' =>2, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Ball bearings (bag of 1,000)', 'cost' =>1, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Barrel', 'cost' =>2, 'currency' =>'gp', 'weight' =>70],
        [ 'name' =>'Basket', 'cost' =>4, 'currency' =>'sp', 'weight' =>2],
        [ 'name' =>'Bedroll', 'cost' =>1, 'currency' =>'gp', 'weight' =>7],
        [ 'name' =>'Bell', 'cost' =>1, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Blanket', 'cost' =>5, 'currency' =>'sp', 'weight' =>3],
        [ 'name' =>'Block and tackle', 'cost' =>1, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Blowgun needles (50)', 'cost' =>1, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Book', 'cost' =>25, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Bottle, glass', 'cost' =>2, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Bucket', 'cost' =>5, 'currency' =>'cp', 'weight' =>2],
        [ 'name' =>'Caltrops (bag of 20)', 'cost' =>1, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Candle', 'cost' =>1, 'currency' =>'cp', 'weight' =>0],
        [ 'name' =>'Case, crossbow bolt', 'cost' =>1, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Case, map or scroll', 'cost' =>1, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Chain (10 feet)', 'cost' =>5, 'currency' =>'gp', 'weight' =>10],
        [ 'name' =>'Chalk (1 piece)', 'cost' =>1, 'currency' =>'cp', 'weight' =>0],
        [ 'name' =>'Chest', 'cost' =>5, 'currency' =>'gp', 'weight' =>25],
        [ 'name' =>'Climber\'s kit', 'cost' =>25, 'currency' =>'gp', 'weight' =>12],
        [ 'name' =>'Clothes, common', 'cost' =>5, 'currency' =>'sp', 'weight' =>3],
        [ 'name' =>'Clothes, costume', 'cost' =>5, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Clothes, fine', 'cost' =>15, 'currency' =>'gp', 'weight' =>6],
        [ 'name' =>'Clothes, traveler\'s', 'cost' =>2, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Component pouch', 'cost' =>25, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Crossbow bolts (20)', 'cost' =>1, 'currency' =>'gp', 'weight' =>1.5],
        [ 'name' =>'Crowbar', 'cost' =>2, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Crystal', 'cost' =>10, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Emblem', 'cost' =>5, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Fishing tackle', 'cost' =>1, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Flask or tankard', 'cost' =>2, 'currency' =>'cp', 'weight' =>1],
        [ 'name' =>'Grappling hook', 'cost' =>2, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Hammer', 'cost' =>1, 'currency' =>'gp', 'weight' =>3],
        [ 'name' =>'Hammer, sledge', 'cost' =>2, 'currency' =>'gp', 'weight' =>10],
        [ 'name' =>'Healer\'s kit', 'cost' =>5, 'currency' =>'gp', 'weight' =>3],
        [ 'name' =>'Holy water (flask)', 'cost' =>25, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Hourglass', 'cost' =>25, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Hunting trap', 'cost' =>5, 'currency' =>'gp', 'weight' =>25],
        [ 'name' =>'Ink (1 ounce bottle)', 'cost' =>10, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Ink pen', 'cost' =>2, 'currency' =>'cp', 'weight' =>0],
        [ 'name' =>'Jug or pitcher', 'cost' =>2, 'currency' =>'cp', 'weight' =>4],
        [ 'name' =>'Ladder (10 foot)', 'cost' =>1, 'currency' =>'sp', 'weight' =>25],
        [ 'name' =>'Lamp', 'cost' =>5, 'currency' =>'sp', 'weight' =>1],
        [ 'name' =>'Lantern, bullseye', 'cost' =>10, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Lantern, hooded', 'cost' =>5, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Lock', 'cost' =>10, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Magnifying glass', 'cost' =>100, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Manacles', 'cost' =>2, 'currency' =>'gp', 'weight' =>6],
        [ 'name' =>'Mess kit', 'cost' =>2, 'currency' =>'sp', 'weight' =>1],
        [ 'name' =>'Mirror, steel', 'cost' =>5, 'currency' =>'gp', 'weight' =>0.5],
        [ 'name' =>'Oil (flask)', 'cost' =>1, 'currency' =>'sp', 'weight' =>1],
        [ 'name' =>'Orb', 'cost' =>20, 'currency' =>'gp', 'weight' =>3],
        [ 'name' =>'Paper (one sheet)', 'cost' =>2, 'currency' =>'sp', 'weight' =>0],
        [ 'name' =>'Parchment (one sheet)', 'cost' =>1, 'currency' =>'sp', 'weight' =>0],
        [ 'name' =>'Perfume (vial)', 'cost' =>5, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Pick, miner\'s', 'cost' =>2, 'currency' =>'gp', 'weight' =>10],
        [ 'name' =>'Piton', 'cost' =>5, 'currency' =>'cp', 'weight' =>0.25],
        [ 'name' =>'Poison, basic (vial)', 'cost' =>100, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Pole (100foot)', 'cost' =>5, 'currency' =>'cp', 'weight' =>7],
        [ 'name' =>'Pot, iron', 'cost' =>2, 'currency' =>'gp', 'weight' =>10],
        [ 'name' =>'Potion of healing', 'cost' =>50, 'currency' =>'gp', 'weight' =>0.5],
        [ 'name' =>'Pouch', 'cost' =>5, 'currency' =>'sp', 'weight' =>1],
        [ 'name' =>'Quiver', 'cost' =>1, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Ram, portable', 'cost' =>4, 'currency' =>'gp', 'weight' =>35],
        [ 'name' =>'Rations (1 day)', 'cost' =>5, 'currency' =>'sp', 'weight' =>2],
        [ 'name' =>'Reliquary', 'cost' =>5, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Robes', 'cost' =>1, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Rod', 'cost' =>10, 'currency' =>'gp', 'weight' =>2],
        [ 'name' =>'Rope, hempen (50 feet)', 'cost' =>1, 'currency' =>'gp', 'weight' =>10],
        [ 'name' =>'Rope, silk (50 feet)', 'cost' =>10, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Sack', 'cost' =>1, 'currency' =>'cp', 'weight' =>0.5],
        [ 'name' =>'Scale, merchant\'s', 'cost' =>5, 'currency' =>'gp', 'weight' =>3],
        [ 'name' =>'Sealing wax', 'cost' =>5, 'currency' =>'sp', 'weight' =>0],
        [ 'name' =>'Shovel', 'cost' =>2, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Signal whistle', 'cost' =>5, 'currency' =>'cp', 'weight' =>0],
        [ 'name' =>'Signet ring', 'cost' =>5, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Sling bullets (20)', 'cost' =>4, 'currency' =>'cp', 'weight' =>1.5],
        [ 'name' =>'Soap', 'cost' =>2, 'currency' =>'cp', 'weight' =>0],
        [ 'name' =>'Spellbook', 'cost' =>50, 'currency' =>'gp', 'weight' =>3],
        [ 'name' =>'Spikes, iron (10)', 'cost' =>1, 'currency' =>'gp', 'weight' =>5],
        [ 'name' =>'Sprig of mistletoe', 'cost' =>1, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Spyglass', 'cost' =>1000, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Staff', 'cost' =>5, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Tent, two person', 'cost' =>2, 'currency' =>'gp', 'weight' =>20],
        [ 'name' =>'Tinderbox', 'cost' =>5, 'currency' =>'sp', 'weight' =>1],
        [ 'name' =>'Torch', 'cost' =>1, 'currency' =>'cp', 'weight' =>1],
        [ 'name' =>'Totem', 'cost' =>1, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Vial', 'cost' =>1, 'currency' =>'gp', 'weight' =>0],
        [ 'name' =>'Wand', 'cost' =>10, 'currency' =>'gp', 'weight' =>1],
        [ 'name' =>'Waterskin', 'cost' =>2, 'currency' =>'sp', 'weight' =>5],
        [ 'name' =>'Whetstone', 'cost' =>1, 'currency' =>'cp', 'weight' =>1],
        [ 'name' =>'Wooden staff', 'cost' =>5, 'currency' =>'gp', 'weight' =>4],
        [ 'name' =>'Yew wand', 'cost' =>10, 'currency' =>'gp', 'weight' =>1],
      ]);

      for ($i = 0; $i < 20; $i++) {
        $user = factory(User::class)->create();
        $wallet = factory(Wallet::class)->create(['user_id' => $user->id]);
        $wallet = factory(Diary::class)->create(['user_id' => $user->id]);
      }
    }
}
