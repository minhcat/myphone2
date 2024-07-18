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

    public function paginateByAreaId($area_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('area_id', $area_id)->orderBy($this->orderBy, $this->orderType);
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
