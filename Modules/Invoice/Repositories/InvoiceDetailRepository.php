<?php

namespace Modules\Invoice\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Invoice\Entities\InvoiceDetail;

class InvoiceDetailRepository extends AbstractRepository
{
    public function getModel()
    {
        return new InvoiceDetail();
    }
}