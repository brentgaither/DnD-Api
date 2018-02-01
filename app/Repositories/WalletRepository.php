<?php namespace App\Repositories;

use App\Models\Wallet;
use Illuminate\Support\Facades\DB;

/**
 * This class holds all of the methods for updating the wallets table.
 */
class WalletRepository extends BaseRepository
{

    /**
     * Create a new wallet Repository instance.
     *
     * @param  App\Models\Wallet $wallet
     * @return void
     */
    public function __construct(Wallet $wallets)
    {
        $this->model = $wallets;
    }

    /**
     * Get all the wallets
     *
     * @return Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->model;
    }

    /**
     * Store a new wallet.
     *
     * @param  array $inputs
     * @return \App\Models\Wallet
     */
    public function store($inputs)
    {
        $wallet = new $this->model;
        $wallet = $this->save($wallet, $inputs);
        return $wallet;
    }

    /**
     * Save the wallet, only save values that were set in the request
     *
     * @param  \App\Models\Wallet $wallet
     * @param  array  $inputs
     * @return Wallet $wallet
     */
    private function save(Wallet $wallet, $inputs)
    {
        $wallet->gold = $inputs['gold'];
        $wallet->silver = $inputs['silver'];
        $wallet->copper = $inputs['copper'];
        $wallet->save();
        return $wallet;
    }

    /**
     * Update a wallet.
     *
     * @param  array $inputs
     * @param  Wallet $wallet
     * @return Wallet $wallet
     */
    public function update($inputs, Wallet $wallet)
    {
        $wallet = $this->save($wallet, $inputs);
        return $wallet;
    }
}
