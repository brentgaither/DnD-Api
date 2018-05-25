<?php namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * This class holds all of the methods for updating the wallets table.
 */
class UserRepository extends BaseRepository
{

    /**
     * Create a new wallet Repository instance.
     *
     * @param  App\Models\Wallet $wallet
     * @return void
     */
    public function __construct(User $user)
    {
        $this->model = $user;
    }
}
