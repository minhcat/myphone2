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

    protected function convertDataUpdate($data, $more = [])
    {
        if (!isset($data['note']) || !$data['note']) {
            $data['note'] = '';
        }

        return parent::convertDataUpdate($data, $more);
    }
}
