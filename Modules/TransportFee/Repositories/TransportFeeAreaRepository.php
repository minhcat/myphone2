<?php

namespace Modules\TransportFee\Repositories;

use App\Repositories\AbstractRepository;
use Modules\TransportFee\Entities\TransportFeeArea;

class TransportFeeAreaRepository extends AbstractRepository
{
    public function getModel()
    {
        return new TransportFeeArea();
    }

    public function paginateByTransportFeeId($transport_fee_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        return $this->model->where('transport_fee_id', $transport_fee_id)->orderBy($this->orderBy, $this->orderType)->paginate($take);
    }
}