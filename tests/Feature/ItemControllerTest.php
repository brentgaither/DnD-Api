<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Item;
use App\Models\User;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetItems()
    {
        $user = factory(User::class)->create();
        factory(Item::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/items');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' => [
                'id',
                'name',
                'description',
                'weight',
                'created_at',
                'updated_at'
            ]]);
    }

    public function testGetItem()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/items/' . $item->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'name',
                'description',
                'weight',
                'created_at',
                'updated_at'
            ]);
    }

    public function testGetItemMissing()
    {
        $user = factory(User::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/items/' . 1);
        $response
            ->assertStatus(404);
    }

    public function testCreateItem()
    {
        $user = factory(User::class)->create();
        $new_item = ['name' => 'cool item',
                    'description' => 'Neato item',
                    'weight' => 10,
                    'cost' => 10,
                    'currency' => 'sp'
                ];
        $response = $this
        ->actingAs($user, 'api')
        ->json('Post', '/api/items/', $new_item);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'name',
                'description',
                'weight',
                'created_at',
                'updated_at'
            ]);
    }

    public function testUpdateItem()
    {
        $user = factory(User::class)->create();
        $new_item = ['name' => 'updated item',
                    'description' => 'Neato item',
                    'weight' => 10,
                    'cost' => 10,
                    'currency' => 'sp'
                ];
        $item = factory(Item::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Put', '/api/items/' . $item->id, $new_item);
        $response
             ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'name',
                'description',
                'weight',
                'cost',
                'currency',
                'created_at',
                'updated_at'
            ]);
    }

    public function testDeleteItem()
    {
        $user = factory(User::class)->create();
        $item = factory(Item::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Delete', '/api/items/' . $item->id);
        $response
            ->assertStatus(200);
        }
}
