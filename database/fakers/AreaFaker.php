<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class AreaFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/area/area.php';
    }

    protected function generate()
    {
        parent::generate();

        $this->generateAuthorId();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'area_author_ids', 2);
    }
}