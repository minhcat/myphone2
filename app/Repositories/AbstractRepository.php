<?php

namespace App\Repositories;

abstract class AbstractRepository implements RepositoryInterface
{
    const TAKE_DEFAULT = 5;
    const PAGE_DEFAULT = 1;
    const SKIP_DEFAULT = 0;

    /** @var \Illuminate\Database\Eloquent\Model */
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract function getModel();

    public function all()
    {
        return $this->model->all();
    }

    public function get($skip = self::SKIP_DEFAULT, $take = self::TAKE_DEFAULT)
    {
        return $this->model->skip($skip)->take($take)->get();
    }

    // todo: replace take and search
    public function paginate($take = self::TAKE_DEFAULT, $search = null, $field = null)
    {
        if (is_null($search)) {
            return $this->model->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('name', 'LIKE', "%$search%")->paginate($take);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function count()
    {
        return $this->model->count();
    }

    public function create($data, $more = [])
    {
        $data = $this->convertDataCreate($data, $more);

        return $this->model->create($data);
    }

    public function update($id, $data, $more = [])
    {
        $data = $this->convertDataUpdate($data, $more);

        return $this->model->whereId($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->whereId($id)->delete();
    }

    protected function convertDataCreate($data, $more = [])
    {
        return $data;
    }

    protected function convertDataUpdate($data, $more = [])
    {
        return $data;
    }
}