<?php

namespace Modules\Area\Repositories;

use App\Enums\TerritoryType;
use App\Repositories\AbstractRepository;
use Modules\Area\Entities\AreaDetail;

class AreaDetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new AreaDetail();
    }

    public function paginateByAreaId($area_id, $search = null, $take = self::TAKE_DEFAULT)
    {
        if ($search !== null) {
            return $this->model->where(function($query) use ($search) {
                $query->where(function($query2) use ($search) {
                    $query2->where('territory_type', TerritoryType::WARD)
                    ->whereHas('territory', function($query3) use ($search) {
                        $query3->where('name', 'like', '%'.$search.'%');
                    });
                })->orWhere(function($query2) use ($search) {
                    $query2->where('territory_type', TerritoryType::DISTRICT)
                    ->whereHas('district', function($query3) use ($search) {
                        $query3->where('name', 'like', '%'.$search.'%');
                    });
                })->orWhere(function($query2) use ($search) {
                    $query2->where('territory_type', TerritoryType::CITY)
                    ->whereHas('city', function($query3) use ($search) {
                        $query3->where('name', 'like', '%'.$search.'%');
                    });
                });
            })
            ->orderBy($this->orderBy, $this->orderType)->where('area_id', $area_id)->paginate($take);
        }
        return $this->model->where('area_id', $area_id)->orderBy($this->orderBy, $this->orderType)->paginate($take);
    }

    protected function convertDataCreate($data, $more = [])
    {
        $data = $this->convertDataForm($data);

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        $data = $this->convertDataForm($data);

        return parent::convertDataCreate($data, $more);
    }

    private function convertDataForm($data)
    {
        if (array_key_exists('territory_type', $data)) {
            switch ($data['territory_type']) {
                case TerritoryType::CITY: $data['territory_id'] = array_key_exists('city_id', $data) ? $data['city_id'] : 0; break;
                case TerritoryType::DISTRICT: $data['territory_id'] = array_key_exists('district_id', $data) ? $data['district_id'] : 0; break;
                case TerritoryType::WARD: $data['territory_id'] = array_key_exists('ward_id', $data) ? $data['ward_id'] : 0; break;
                default: $data['territory_id'] = 0;
            }
        }

        return $data;
    }
}
