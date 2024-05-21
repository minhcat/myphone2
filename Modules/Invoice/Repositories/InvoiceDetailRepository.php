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

    public function paginateByInvoiceId($invoice_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        if (is_null($search)) {
            return $this->model->where('invoice_id', $invoice_id)->paginate($take);
        }
        if (!is_null($field)) {
            return $this->model->where('invoice_id', $invoice_id)->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $this->model->where('invoice_id', $invoice_id)->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}