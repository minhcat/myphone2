<?php

namespace Modules\Transporter\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Transporter\Entities\Transporter;

class TransporterRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Transporter();
    }
}