<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\UserItem;
use App\Models\Item;
use App\Models\User;

class UserItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetUserItems()
    { 
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        factory(UserItem::class)->create(
          ['user_id' => $user->id,
           'item_id' => $item->id]
        );
        $response = $this->json('Get', '/api/usersItems');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' => [
                'id',
                'item_id',
                'user_id',
                'quantity',
                'created_at',
                'updated_at'
            ]]);
    }

    public function testGetUserItem()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $user_item = factory(UserItem::class)->create(
          ['user_id' => $user->id,
           'item_id' => $item->id]
        );
        $response = $this->json('Get', '/api/usersItems/' . $user_item->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
              'id',
              'item_id',
              'user_id',
              'quantity',
              'created_at',
              'updated_at'
            ]);
    }

    public function testGetUserItemMissing()
    {
        $response = $this->json('Get', '/api/usersItems/' . 1);
        $response
            ->assertStatus(404);
    }

    public function testCreateUserItem()
    {
        $item = factory(Item::class)->create();
        $user = factory(User::class)->create();
        $new_user_item = [
                    'item_id' => $item->id,
                    'quantity' => 10];
        $response = $this
                    ->actingAs($user)
                    ->json('Post', '/api/usersItems/', $new_user_item);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                  'id',
                  'item_id',
                  'user_id',
                  'quantity',
                  'created_at',
                  'updated_at'
            ]);
    }

    public function testUpdateUserItem()
    {
      $item = factory(Item::class)->create();
      $user = factory(User::class)->create();
      $user_item = factory(UserItem::class)->create(
          ['user_id' => $user->id,
          'item_id' => $item->id]
        );
      $new_user_item = ['quantity' => 10];
      $response = $this
                ->actingAs($user)
                ->json('Put', '/api/usersItems/' . $user_item->id, $new_user_item);
      $response
          ->assertStatus(200)
          ->assertJsonStructure([ '*' =>
              'id',
              'item_id',
              'user_id',
              'quantity',
              'created_at',
              'updated_at'
          ]);
    }

    public function testDeleteUserItem()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $user_item = factory(UserItem::class)->create(
          ['user_id' => $user->id,
           'item_id' => $item->id]
        );
      $response = $this->json('Delete', '/api/usersItems/' . $user_item->id);
      $response
          ->assertStatus(200);
    }
}
