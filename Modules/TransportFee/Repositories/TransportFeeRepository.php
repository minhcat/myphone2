<?php

namespace Modules\TransportFee\Repositories;

use App\Repositories\AbstractRepository;
use Modules\TransportFee\Entities\TransportFee;

class TransportFeeRepository extends AbstractRepository
{
    public function getModel()
    {
        return new TransportFee();
    }
}