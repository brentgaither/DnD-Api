<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Get all models
     *
     * @return Illuminate\Support\Collection
     */
    public function index()
    {
        return $this->model;
    }

    /**
     * Destroy a model.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return \App\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }


    /**
     * Get deleted Model by id.
     *
     * @param  int  $id
     * @return \App\Models\Model
     */
    public function getDeletedById($id)
    {
        return $this->model
                    ->withTrashed()
                    ->findOrFail($id);
    }

    public function count()
    {
        return $this->model->count();
    }
}
