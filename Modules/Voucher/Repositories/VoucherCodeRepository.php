<?php

namespace Modules\Voucher\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Voucher\Entities\VoucherCode;

class VoucherCodeRepository extends AbstractRepository
{
    function getModel()
    {
        return new VoucherCode();
    }

    public function paginateByVoucherId($voucher_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('voucher_id', $voucher_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }

    protected function convertDataCreate($data, $more = [])
    {
        if (array_key_exists('discount_value', $data) && $data['discount_value'] === null) {
            unset($data['discount_value']);
        }

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        if (array_key_exists('discount_value', $data) && $data['discount_value'] === null) {
            unset($data['discount_value']);
        }

        return parent::convertDataUpdate($data, $more);
    }
}