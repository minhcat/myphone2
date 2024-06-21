<?php

namespace Modules\Sale\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Sale\Entities\Sale;

class SaleRepository extends AbstractRepository
{
    function getModel()
    {
        return new Sale();
    }

    protected function convertDataCreate($data, $more = [])
    {
        if (isset($data['start_time']) && isset($data['start_date'])) {
            $data['start_datetime'] = $data['start_time'] . ' ' . convert_stdtime($data['start_date'], 'd/m/Y');
        }
        if (isset($data['end_time']) && isset($data['start_time'])) {
            $data['end_datetime'] = $data['end_time'] . ' ' . convert_stdtime($data['end_date'], 'd/m/Y');
        }

        if (array_key_exists('discount_value', $data) && $data['discount_value'] === null) {
            unset($data['discount_value']);
        }

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        if (isset($data['start_time']) && isset($data['start_date'])) {
            $data['start_datetime'] = $data['start_time'] . ' ' . convert_stdtime($data['start_date'], 'd/m/Y');
        }
        if (isset($data['end_time']) && isset($data['start_time'])) {
            $data['end_datetime'] = $data['end_time'] . ' ' . convert_stdtime($data['end_date'], 'd/m/Y');
        }

        if (array_key_exists('discount_value', $data) && $data['discount_value'] === null) {
            unset($data['discount_value']);
        }

        return parent::convertDataUpdate($data, $more);
    }
}