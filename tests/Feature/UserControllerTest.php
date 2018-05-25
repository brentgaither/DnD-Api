<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;


    public function testGetUser()
    {
        $user = factory(User::class)->create();
        $response = $this
        ->actingAs($user)
        ->json('Get', '/api/user/');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'name',
                'email',
                'created_at',
                'updated_at'
            ]);
    }

}
