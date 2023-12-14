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

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        if (!isset($data['note']) || !$data['note']) {
            $data['note'] = '';
        }

        return parent::convertDataUpdate($data, $more);
    }
}
