<?php

namespace Modules\Brand\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Brand\Entities\Brand;

class BrandRepository extends AbstractRepository
{
    function getModel()
    {
        return new Brand();
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