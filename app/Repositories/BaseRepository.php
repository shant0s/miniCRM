<?php

namespace App\Repositories;

class BaseRepository
{
    /**
     * @var $model
     */
    public $model;

    /**
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function paginate($limit)
    {
        return $this->model->orderBy('id', 'DESC')->paginate($limit);
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->model->all();
    }

    /**
     * @return mixed
     */
    public function pluckAll()
    {
        return $this->model->all()->pluck('name', 'id');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->findorFail($id);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function store($input)
    {
        $model = $this->model->newInstance($input);
        $model->save();

        return $model;
    }

    /**
     * @param $input
     * @param $model
     * @return mixed
     */
    public function update($input, $model)
    {
        $model->fill($input);
        $model->save();

        return $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $model = $this->getById($id);

        return $model->delete();
    }
}
