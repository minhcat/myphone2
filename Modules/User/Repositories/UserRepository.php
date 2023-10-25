<?php

namespace Modules\User\Repositories;

use App\Repositories\AbstractRepository;
use Modules\User\Entities\User;

class UserRepository extends AbstractRepository
{
    function getModel()
    {
        return new User();
    }

    protected function convertDataCreate($data, $more = [])
    {
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] == 'on';

        return $data;
    }

    protected function convertDataUpdate($data, $more = [])
    {
        unset($data['_token']);
        unset($data['_method']);

        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] == 'on';

        return $data;
    }
}