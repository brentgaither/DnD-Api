<?php namespace App\Repositories;

use App\Models\Diary;
//REMOVE THIS! Only here until the authentication is done
use App\Models\User;
use Illuminate\Support\Facades\DB;

/**
 * This class holds all of the methods for updating the diary table.
 */
class DiaryRepository extends BaseRepository
{

    /**
     * Create a new diary Repository instance.
     *
     * @param  App\Models\Diary $diary
     * @return void
     */
    public function __construct(Diary $diaries)
    {
        $this->model = $diaries;
    }

    /**
     * Store a new diary.
     *
     * @param  array $inputs
     * @return \App\Models\Diary
     */
    public function store($inputs)
    {
        $diary = new $this->model;
        // Fake the user id for the moment
        $inputs['user_id'] = User::first()->id;
        $diary = $this->save($diary, $inputs);
        return $diary;
    }

    /**
     * Save the diary, only save values that were set in the request
     *
     * @param  \App\Models\Diary $diary
     * @param  array  $inputs
     * @return Diary $diary
     */
    private function save(Diary $diary, $inputs)
    {
        $diary->title = $inputs['title'];
        $diary->description = $inputs['description'];
        if(isset($inputs['user_id'])){
          $diary->user_id = $inputs['user_id'];
        }
        $diary->save();
        return $diary;
    }

    /**
     * Update an diary.
     *
     * @param  array $inputs
     * @param  Diary $diary
     * @return Diary $diary
     */
    public function update($inputs, Diary $diary)
    {
        $diary = $this->save($diary, $inputs);
        return $diary;
    }
}
