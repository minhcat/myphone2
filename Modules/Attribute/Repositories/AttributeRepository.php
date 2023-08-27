<?php

namespace Modules\Attribute\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Attribute\Entities\Attribute;

class AttributeRepository extends AbstractRepository
{
    function getModel()
    {
        return new Attribute();
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