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

    protected function convertDataUpdate($data, $more = [])
    {
        if (!isset($data['note']) || !$data['note']) {
            $data['note'] = '';
        }

        return parent::convertDataUpdate($data, $more);
    }
}
