<?php

namespace Modules\Sale\Repositories;

use App\Enums\TargetType;
use App\Repositories\AbstractRepository;
use Modules\Sale\Entities\SaleProduct;

class SaleProductRepository extends AbstractRepository
{
    function getModel()
    {
        return new SaleProduct();
    }

    public function paginateBySaleId($sale_id, $search = null, $take = self::TAKE_DEFAULT)
    {
        if ($search !== null) {
            return $this->model->where(function($query) use ($search) {
                $query->where(function($query2) use ($search) {
                    $query2->where('target_type', TargetType::PRODUCT)
                    ->whereHas('target', function($query3) use ($search) {
                        $query3->where('name', 'like', '%'.$search.'%');
                    });
                })->orWhere(function($query2) use ($search) {
                    $query2->where('target_type', TargetType::VARIANT)
                    ->whereHas('variation', function($query3) use ($search) {
                        $query3->whereHas('product', function($query4) use ($search) {
                            $query4->where('name', 'like', '%'.$search.'%');
                        });
                    });
                });
            })
            ->orderBy($this->orderBy, $this->orderType)->where('sale_id', $sale_id)->paginate($take);
        }
        return $this->model->orderBy($this->orderBy, $this->orderType)->where('sale_id', $sale_id)->paginate($take);
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