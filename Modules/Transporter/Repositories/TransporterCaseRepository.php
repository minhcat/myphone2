<?php

namespace Modules\Transporter\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Transporter\Entities\TransporterCase;

class TransporterCaseRepository extends AbstractRepository
{
    public function getModel()
    {
        return new TransporterCase();
    }
}