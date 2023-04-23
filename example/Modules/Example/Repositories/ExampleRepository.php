<?php

namespace Modules\Example\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Example\Entities\Example;
use Illuminate\Support\Str;

class ExampleRepository extends AbstractRepository
{
    function getModel()
    {
        return new Example();
    }

    protected function convertDataCreate($data)
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

        return parent::convertDataCreate($data);
    }

    protected function convertDataUpdate($data)
    {
        unset($data['_token']);
        unset($data['_method']);

        if (!isset($data['note']) || !$data['note']) {
            $data['note'] = '';
        }

        return $data;
    }
}