<?php namespace App\Repositories;

use App\Models\Character;
use Illuminate\Support\Facades\DB;

/**
 * This class holds all of the methods for updating the characters table.
 */
class CharacterRepository extends BaseRepository
{

    /**
     * Create a new character Repository instance.
     *
     * @param  App\Models\character $character
     * @return void
     */
    public function __construct(Character $characters)
    {
        $this->model = $characters;
    }

    public function getByUserId($user_id)
    {
      return $this->model->where('user_id', $user_id)->first();
    }

    /**
     * Store a new character.
     *
     * @param  array $inputs
     * @return \App\Models\Character
     */
    public function store($inputs)
    {
        $character = new $this->model;
        $character = $this->save($character, $inputs);
        return $character;
    }

    /**
     * Save the character, only save values that were set in the request
     *
     * @param  \App\Models\character $character
     * @param  array  $inputs
     * @return character $character
     */
    private function save(Character $character, $inputs)
    {
        $character->name = $inputs['name'];
        $character->armour_class = $inputs['armour_class'];
        $character->hit_points = $inputs['hit_points'];
        $character->strength = $inputs['strength'];
        $character->wisdom = $inputs['wisdom'];
        $character->intelligence = $inputs['intelligence'];
        if(isset($inputs['user_id'])){
          $character->user_id = $inputs['user_id'];
        }
        $character->save();
        return $character;
    }

    /**
     * Update a character.
     *
     * @param  array $inputs
     * @param  Character $character
     * @return Character $character
     */
    public function update($inputs, Character $character)
    {
        $character = $this->save($character, $inputs);
        return $character;
    }
}
