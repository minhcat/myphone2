<?php

namespace Modules\Invoice\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Invoice\Entities\Invoice;

class InvoiceRepository extends AbstractRepository
{
    protected $searchFieldName = 'code';

    public function getModel()
    {
        return new Invoice();
    }
}