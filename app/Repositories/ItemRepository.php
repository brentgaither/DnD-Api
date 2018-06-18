<?php namespace App\Repositories;

use App\Models\Item;
use Illuminate\Support\Facades\DB;

/**
 * This class holds all of the methods for updating the items table.
 */
class ItemRepository extends BaseRepository
{

    /**
     * Create a new item Repository instance.
     *
     * @param  App\Models\Item $item
     * @return void
     */
    public function __construct(Item $items)
    {
        $this->model = $items;
    }

    /**
     * Create a new item Repository instance.
     *
     * @param  string $query
     * @return Collection \App\Models\Item
     */
    public function seachByName($query)
    {
      return $this->model->where('name', 'like', "%" . $query . "%");
    }

    /**
     * Store a new item.
     *
     * @param  array $inputs
     * @return \App\Models\Item
     */
    public function store($inputs)
    {
        $item = new $this->model;
        $item = $this->save($item, $inputs);
        return $item;
    }

    /**
     * Save the item, only save values that were set in the request
     *
     * @param  \App\Models\Item $item
     * @param  array  $inputs
     * @return Item #item
     */
    private function save(Item $item, $inputs)
    {
        $item->name = $inputs['name'];
        $item->description = $inputs['description'];
        $item->weight = $inputs['weight'];
        $item->currency = $inputs['currency'];
        $item->save();
        return $item;
    }

    /**
     * Update an item.
     *
     * @param  array $inputs
     * @param  Item $item
     * @return Item $item
     */
    public function update($inputs, Item $item)
    {
        $item = $this->save($item, $inputs);
        return $item;
    }
}
