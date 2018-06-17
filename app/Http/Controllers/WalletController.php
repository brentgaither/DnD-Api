<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\WalletRepository;
use App\Models\Wallet;

class WalletController extends Controller
{

  public function __construct(WalletRepository $wallet_repository)
    {
        $this->middleware('auth:api');
        $this->wallets = $wallet_repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->wallets->index()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->wallets->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Wallet $wallet)
    {
        return $wallet;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wallet = $this->wallets->getById($id);
        return $this->wallets->update($request, $wallet);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->wallets->destroy($id);
    }
}
