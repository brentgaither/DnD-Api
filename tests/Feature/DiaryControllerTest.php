<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Diary;
use App\Models\User;

class DiaryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetDiaries()
    {
        $user = factory(User::class)->create();
        factory(Diary::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/diaries');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' => [
                'id',
                'title',
                'description',
                'created_at',
                'updated_at'
            ]]);
    }

    public function testGetDiary()
    {
        $user = factory(User::class)->create();
        $diary = factory(Diary::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/diaries/' . $diary->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'title',
                'description',
                'created_at',
                'updated_at'
            ]);
    }

    public function testGetDiaryMissing()
    {
        $user = factory(User::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Get', '/api/diaries/' . 1);
        $response
            ->assertStatus(404);
    }

    public function testCreateDiary()
    {
        $user = factory(User::class)->create();
        $new_diary = ['title' => 'cool adventure',
                    'description' => 'Neato, were out here!',
                    'user_id' => $user->id];
        $response = $this
        ->actingAs($user, 'api')
        ->json('Post', '/api/diaries/', $new_diary);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'title',
                'description',
                'created_at',
                'updated_at'
            ]);
    }

    public function testUpdateDiary()
    {
        $user = factory(User::class)->create();
        $new_diary = ['title' => 'updated adventure',
                    'description' => 'Neato, were really killing dragons',
                    'weight' => 10];
        $diary = factory(Diary::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Put', '/api/diaries/' . $diary->id, $new_diary);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'title',
                'description',
                'created_at',
                'updated_at'
            ]);
    }

    public function testDeleteDiary()
    {
        $user = factory(User::class)->create();
        $diary = factory(Diary::class)->create();
        $response = $this
        ->actingAs($user, 'api')
        ->json('Delete', '/api/diaries/' . $diary->id);
        $response
            ->assertStatus(200);
    }
}
