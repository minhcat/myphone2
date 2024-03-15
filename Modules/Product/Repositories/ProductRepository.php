<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Product;
use Illuminate\Support\Str;

class ProductRepository extends AbstractRepository
{
    function getModel()
    {
        return new Product();
    }

    protected function convertDataCreate($data, $more = [])
    {
        if (!isset($data['slug'])) {
            $data['slug'] = Str::slug($data['name'], '-');
        }

        if (!isset($data['sku_prefix'])) {
            $data['sku_prefix'] = 'PRO';
        }

        if (!isset($data['sku_number'])) {
            $model = $this->model->selectRaw('MAX(sku_number) as sku_number')->first();
            $data['sku_number'] = str_pad(intval($model->sku_number) + 1, 4, '0', STR_PAD_LEFT);
        }

        // categories
        if (!isset($data['categories'])) {
            $data['categories'] = [];
        } else {
            $data['categories'] = array_keys($data['categories']);
        }

        // tags
        if (!isset($data['tags'])) {
            $data['tags'] = [];
        } else {
            $data['tags'] = json_decode($data['tags']);
        }

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        if (!isset($data['note']) || !$data['note']) {
            $data['note'] = '';
        }

        // categories
        if (!isset($data['categories'])) {
            $data['categories'] = [];
        } else {
            $data['categories'] = array_keys($data['categories']);
        }

        // tags
        if (!isset($data['tags'])) {
            $data['tags'] = [];
        } else {
            $data['tags'] = json_decode($data['tags']);
        }

        return parent::convertDataUpdate($data, $more);
    }

    public function create($data, $more = [])
    {
        $data = $this->convertDataCreate($data, $more);

        $model = $this->model->create($data);

        $model->categories()->sync($data['categories']);

        $model->tags()->sync($data['tags']);

        return $model;
    }

    public function update($id, $data, $more = [])
    {
        $data = $this->convertDataUpdate($data, $more);

        $model = $this->model->find($id);

        $model->categories()->detach();

        $model->update($data);

        $model->categories()->sync($data['categories']);

        $model->tags()->sync($data['tags']);

        return $model;
    }
}
