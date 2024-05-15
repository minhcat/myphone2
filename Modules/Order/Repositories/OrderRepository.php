<?php

namespace Modules\Order\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Order\Entities\Order;

class OrderRepository extends AbstractRepository
{
    protected $searchFieldName = 'code';

    function getModel()
    {
        return new Order();
    }

    public function create($data, $more = [])
    {
        return parent::create($data, $more);
    }

    public function convertDataCreate($data, $more = [])
    {
        if (!isset($data['code'])) {
            do {
                $code = rand(1000, 9999);
                $order = $this->model->where('code', '#'.$code)->first();
            } while ($order !== null);
            $data['code'] = '#'.$code;
        }

        return parent::convertDataCreate($data, $more);
    }
}