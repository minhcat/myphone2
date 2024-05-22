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

    public function paginateByInvoiceId($invoice_id, $take = self::TAKE_DEFAULT)
    {
        return $this->model->where('invoice_id', $invoice_id)->paginate($take);
    }
}