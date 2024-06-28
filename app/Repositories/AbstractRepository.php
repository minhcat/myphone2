<?php

namespace App\Repositories;

abstract class AbstractRepository implements RepositoryInterface
{
    const TAKE_DEFAULT = 5;
    const PAGE_DEFAULT = 1;
    const SKIP_DEFAULT = 0;

    /** @var \Illuminate\Database\Eloquent\Model */
    protected $model;

    protected $searchFieldName = 'name';

    protected $orderBy = 'id';

    protected $orderType = 'desc';

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract function getModel();

    public function all()
    {
        return $this->model->all();
    }

    public function get($where = [], $skip = self::SKIP_DEFAULT, $take = self::TAKE_DEFAULT)
    {
        return $this->model->where($where)->skip($skip)->take($take)->get();
    }

    // todo: replace take and search
    public function paginate($search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
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

        $model = $this->model->find($id);

        $model->update($data);

        return $model;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);

        return $model->delete();
    }

    protected function convertDataCreate($data, $more = [])
    {
        foreach ($more as $name => $field) {
            $data[$name] = $field;
        }

        if (array_key_exists('description', $data) && $data['description'] === null) {
            $data['description'] = '';
        }

        if (array_key_exists('note', $data) && $data['note'] === null) {
            $data['note'] = '';
        }

        return $data;
    }

    protected function convertDataUpdate($data, $more = [])
    {
        foreach ($more as $name => $field) {
            $data[$name] = $field;
        }

        if (array_key_exists('name', $data) && $data['name'] === null) {
            unset($data['name']);
        }

        if (array_key_exists('description', $data) && $data['description'] === null) {
            $data['description'] = '';
        }

        if (array_key_exists('note', $data) && $data['note'] === null) {
            $data['note'] = '';
        }

        return $data;
    }
}
