<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class PermissionFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/permission/permission.php';
    }

    protected function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateName();
        $this->generateTable();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'permission_user_ids', 10);
    }

    private function generateName()
    {
        if (str_contains($this->key, 'browse')) {
            $this->name = 'Browse';
        } elseif (str_contains($this->key, 'read')) {
            $this->name = 'Read';
        } elseif (str_contains($this->key, 'add')) {
            $this->name = 'Add';
        } elseif (str_contains($this->key, 'edit')) {
            $this->name = 'Edit';
        } elseif (str_contains($this->key, 'delete')) {
            $this->name = 'Delete';
        } elseif (str_contains($this->key, 'approve')) {
            $this->name = 'Approve';
        } elseif (str_contains($this->key, 'order')) {
            $this->name = 'Order';
        }
    }

    private function generateTable()
    {
        $array = explode(':', $this->key);
        $this->table = $array[0];
    }
}