<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Wallet;
use App\Models\User;

class WalletControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testGetWallets()
    {
        factory(Wallet::class)->create();
        $response = $this->json('Get', '/api/wallets');
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' => [
                'id',
                'gold',
                'silver',
                'copper',
                'created_at',
                'updated_at'
            ]]);
    }

    public function testGetWallet()
    {
        $wallet = factory(Wallet::class)->create();
        $response = $this->json('Get', '/api/wallets/' . $wallet->id);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'gold',
                'silver',
                'copper',
                'created_at',
                'updated_at'
            ]);
    }

    public function testGetWalletMissing()
    {
        $response = $this->json('Get', '/api/wallets/' . 1);
        $response
            ->assertStatus(404);
    }

    public function testCreateWallet()
    {
        $user = factory(User::class)->create();
        $new_wallet = ['gold' => 40,
                    'silver' => 20,
                    'copper' => 10,
                    'user_id' => $user->id];
        $response = $this->json('Post', '/api/wallets/', $new_wallet);
        $response
            ->assertStatus(200)
            ->assertJsonStructure([ '*' =>
                'id',
                'gold',
                'silver',
                'copper',
                'created_at',
                'updated_at'
            ]);
    }

    public function testUpdateWallet()
    {

      $wallet = factory(Wallet::class)->create();
      $new_wallet = ['gold' => 40,
                  'silver' => 12,
                  'copper' => 10,
                  'user_id' => $wallet->user_id];
      $response = $this->json('Put', '/api/wallets/' . $wallet->id, $new_wallet);
      $response
          ->assertStatus(200)
          ->assertJsonStructure([ '*' =>
              'id',
              'gold',
              'silver',
              'copper',
              'created_at',
              'updated_at'
          ]);
    }

    public function testDeleteWallet()
    {
      $wallet = factory(Wallet::class)->create();
      $response = $this->json('Delete', '/api/wallets/' . $wallet->id);
      $response
          ->assertStatus(200);
    }
}
