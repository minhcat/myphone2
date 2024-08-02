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
}