<?php

namespace Modules\TransportFee\Repositories;

use App\Repositories\AbstractRepository;
use Modules\TransportFee\Entities\TransportFeeAreaCaseRange;

class TransportFeeAreaCaseRangeRepository extends AbstractRepository
{
    public function getModel()
    {
        return new TransportFeeAreaCaseRange();
    }

    public function paginateByTransportFeeAreaCaseId($transport_fee_area_case_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        return $this->model->where('transport_fee_area_case_id', $transport_fee_area_case_id)
        ->orderBy($this->orderBy, $this->orderType)
        ->paginate($take);
    }
}