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

    protected function convertDataCreate($data, $more = [])
    {
        $data['author_id'] = 1; // todo: use Auth

        return $data;
    }

    protected function convertDataUpdate($data, $more = [])
    {
        unset($data['_token']);
        unset($data['_method']);
        unset($data['author_id']);

        if (!isset($data['note']) || !$data['note']) {
            $data['note'] = '';
        }

        return $data;
    }
}