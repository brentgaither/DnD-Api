<?php namespace App\Repositories;

use App\Models\UserItem;
use Illuminate\Support\Facades\DB;

/**
 * This class holds all of the methods for updating the items table.
 */
class UserItemRepository extends BaseRepository
{

    /**
     * Create a new Usersitem Repository instance.
     *
     * @param  App\Models\UserItem $item
     * @return void
     */
    public function __construct(UserItem $user_items)
    {
        $this->model = $user_items;
    }

    public function getById($id)
    {
      return $this->model->where('id', $id)->with('item');
    }

    public function userIndex($user_id)
    {
      return $this->model->where('user_id', $user_id)->with('item');
    }

    /**
     * Store a new item.
     *
     * @param  array $inputs
     * @return \App\Models\Item
     */
    public function store($inputs)
    {
        $user_item = new $this->model;
        $user_item = $this->save($user_item, $inputs);
        return $user_item;
    }

    /**
     * Save the item, only save values that were set in the request
     *
     * @param  \App\Models\Item $item
     * @param  array  $inputs
     * @return UserItem #user_item
     */
    private function save(UserItem $user_item, $inputs)
    {
        $user_item->user_id = $inputs['user_id'];
        if(isset($inputs['item_id'])){
            $user_item->item_id = $inputs['item_id'];
        }
        $user_item->quantity = $inputs['quantity'];
        $user_item->save();
        return $user_item;
    }

    /**
     * Update an item.
     *
     * @param  array $inputs
     * @param  Item $item
     * @return Item $item
     */
    public function update($inputs, UserItem $user_item)
    {
        $user_item = $this->save($user_item, $inputs);
        return $user_item;
    }
}
