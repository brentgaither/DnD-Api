<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Character;
use App\Models\User;

class characterControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetCharacters()
    {
        $user = factory(User::class)->create();
        factory(Character::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/characters');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' => [
                'id',
                'user_id',
                'name',
                'armourClass',
                'hitPoints',
                'created_at',
                'updated_at'
            ]]);
    }

    public function testGetCharacter()
    {
        $user = factory(User::class)->create();
        $character = factory(Character::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/characters/' . $character->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'user_id',
                'name',
                'armourClass',
                'hitPoints',
                'created_at',
                'updated_at'
            ]);
    }

    public function testGetCharacterMissing()
    {
        $user = factory(User::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/characters/' . 1);
        $response
            ->assertStatus(404);
    }

    public function testCreateCharacter()
    {
        $user = factory(User::class)->create();
        $new_character = ['name' => 'tough guy',
                    'armourClass' => 20,
                    'hitPoints' => 30,
                    'user_id' => $user->id];
        $response = $this
        ->actingAs($user, 'api')
        ->json('Post', '/api/characters/', $new_character);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'user_id',
                'name',
                'armourClass',
                'hitPoints',
                'created_at',
                'updated_at'
            ]);
    }

    public function testUpdatecharacter()
    {
        $user = factory(User::class)->create();
        $character = factory(Character::class)->create();

        $new_character = ['name' => 40,
                    'hitPoints' => 12,
                    'armourClass' => 10,
                    'user_id' => $character->user_id];
        $response = $this
        ->actingAs($user, 'api')
        ->json('Put', '/api/characters/' . $character->id, $new_character);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'user_id',
                'name',
                'armourClass',
                'hitPoints',
                'created_at',
                'updated_at'
            ]);
    }

    public function testDeletecharacter()
    {
        $user = factory(User::class)->create();
        $character = factory(Character::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Delete', '/api/characters/' . $character->id);
        $response
            ->assertStatus(200);
    }
}
