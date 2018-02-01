<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Item;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetItems()
    {
        factory(Item::class)->create();
        $response = $this->json('Get', '/api/items');
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
        $item = factory(Item::class)->create();
        $response = $this->json('Get', '/api/items/' . $item->id);
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
        $response = $this->json('Get', '/api/items/' . 1);
        $response
            ->assertStatus(404);
    }

    public function testCreateItem()
    {
        $new_item = ['name' => 'cool item',
                    'description' => 'Neato item',
                    'weight' => 10];
        $response = $this->json('Post', '/api/items/', $new_item);
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
      $new_item = ['name' => 'updated item',
                  'description' => 'Neato item',
                  'weight' => 10];
      $item = factory(Item::class)->create();
      $response = $this->json('Put', '/api/items/' . $item->id, $new_item);
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

    public function testDeleteItem()
    {
      $item = factory(Item::class)->create();
      $response = $this->json('Delete', '/api/items/' . $item->id);
      $response
          ->assertStatus(200);
    }
}
