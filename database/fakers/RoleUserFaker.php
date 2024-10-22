<?php

namespace Database\Fakers;

use Modules\Role\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class RoleUserFaker extends AbstractFaker
{
    protected $roleRepository;
    protected $userRepository;

    public function __construct()
    {
        $this->roleRepository = new RoleRepository();
        $this->userRepository = new UserRepository();

        parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/role_user/role_user.php';
    }

    protected function beforeGenerate()
    {
        $this->genereateUserId();
        $this->genereateRoleId();
    }

    private function genereateUserId()
    {
        $this->user_id = $this->getResourceId($this->userRepository, 'role_user_user_id');
    }

    private function genereateRoleId()
    {
        reset_session('role_user_role_id', 3);
        $this->role_id = $this->getResourceId($this->roleRepository, 'role_user_role_id');
    }
}