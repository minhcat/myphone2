<?php

namespace Modules\User\Repositories;

use App\Repositories\AbstractRepository;
use Modules\User\Entities\User;

class UserRepository extends AbstractRepository
{
    protected $searchFieldName = 'account';

    function getModel()
    {
        return new User();
    }

    protected function convertDataCreate($data, $more = [])
    {
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] == 'on';

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] == 'on';

        return parent::convertDataUpdate($data, $more);
    }
}
