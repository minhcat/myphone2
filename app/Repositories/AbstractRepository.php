<?php

namespace App\Repositories;

abstract class AbstractRepository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract function getModel();

    public function get($skip = 0, $take = 5)
    {
        return $this->model->skip($skip)->take($take)->get();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        return $this->model->whereId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->whereId($id)->delete();
    }
}