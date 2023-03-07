<?php

namespace App\Repositories;

 class BaseRepository
{
    /**
     * @var Model
     */
    public $model;

    public function __construct($model){
        $this->model = $model;
    }

    public function paginate($limit){
        return $this->model->orderBy('id', 'DESC')->paginate($limit);
    }

    public function all(){
        return $this->model->all();
    }

    public function pluckAll(){
        return $this->model->all()->pluck('name', 'id');
    }

    public function getById($id){
        return $this->model->findorFail($id);
    }

    public function store($input){
        $model = $this->model->newInstance($input);
        $model->save();

        return $model;
    }

    public function update($input, $model){
        $model->fill($input);
        $model->save();

        return $model;
    }

    public function destroy($id){
        $model = $this->getById($id);

        return $model->delete();
    }
}