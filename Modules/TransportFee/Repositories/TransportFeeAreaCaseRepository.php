<?php

namespace Modules\TransportFee\Repositories;

use App\Repositories\AbstractRepository;
use Modules\TransportFee\Entities\TransportFeeAreaCase;

class TransportFeeAreaCaseRepository extends AbstractRepository
{
    public function getModel()
    {
        return new TransportFeeAreaCase();
    }

    public function paginateByTransportFeeAreaId($transport_fee_area_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        return $this->model->where('transport_fee_area_id', $transport_fee_area_id)
        ->orderBy($this->orderBy, $this->orderType)
        ->paginate($take);
    }
}