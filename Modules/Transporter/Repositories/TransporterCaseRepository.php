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

    public function paginateByTransporterId($transporter_id, $search = null, $take = self::TAKE_DEFAULT, $field = null)
    {
        $query = $this->model->where('transporter_id', $transporter_id)->orderBy($this->orderBy, $this->orderType);
        if (is_null($search)) {
            return $query->paginate($take);
        }
        if (!is_null($field)) {
            return $query->where($field, 'LIKE', "%$search%")->paginate($take);
        }
        return $query->where($this->searchFieldName, 'LIKE', "%$search%")->paginate($take);
    }
}