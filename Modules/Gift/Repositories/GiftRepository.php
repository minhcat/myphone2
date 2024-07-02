<?php

namespace Modules\Gift\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Gift\Entities\Gift;

class GiftRepository extends AbstractRepository
{
    function getModel()
    {
        return new Gift();
    }

    protected function convertDataCreate($data, $more = [])
    {
        if (isset($data['start_time']) && isset($data['start_date'])) {
            $data['start_datetime'] = $data['start_time'] . ' ' . convert_stdtime($data['start_date'], 'd/m/Y');
        }
        if (isset($data['end_time']) && isset($data['start_time'])) {
            $data['end_datetime'] = $data['end_time'] . ' ' . convert_stdtime($data['end_date'], 'd/m/Y');
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

        return parent::convertDataUpdate($data, $more);
    }
}