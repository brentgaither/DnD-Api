<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\UserItemRepository;
use App\Models\UserItem;

class UserItemController extends Controller
{

  public function __construct(UserItemRepository $user_item_repository)
    {
        $this->middleware('auth:api');
        $this->users_items = $user_item_repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->users_items->index()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['user_id'] = $request->user()->id;
        return $this->users_items->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserItem $user_item)
    {
        return $user_item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserItem $user_item)
    {
        $request['user_id'] = $request->user()->id;
        return $this->users_items->update($request, $user_item);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->users_items->destroy($id);
    }
}
