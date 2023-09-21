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

    protected function convertDataCreate($data)
    {
        $data['author_id'] = 1; // todo: use Auth

        return $data;
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