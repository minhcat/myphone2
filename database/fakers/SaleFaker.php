<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class SaleFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/sale/sale.php';
    }
    
    public function afterGenerate()
    {
        $this->generateAuthorId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'sale_author_ids', 10);
    }
}