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

    public function updateRole($user, $role_data)
    {
        if (!$user instanceof User) {
            $user = $this->model->find($user);
        }
        $user->roles()->detach();
        $user->roles()->attach(array_keys($role_data));
    }

    protected function convertDataCreate($data, $more = [])
    {
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] == 'on';
        $data['password'] = isset($data['password']) ? bcrypt($data['password']) : null;

        return parent::convertDataCreate($data, $more);
    }

    protected function convertDataUpdate($data, $more = [])
    {
        $data['is_admin'] = isset($data['is_admin']) && $data['is_admin'] == 'on';

        return parent::convertDataUpdate($data, $more);
    }
}
