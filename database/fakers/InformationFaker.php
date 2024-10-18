<?php

namespace Database\Fakers;

use Modules\Specification\Repositories\SpecificationRepository;
use Modules\User\Repositories\UserRepository;

class InformationFaker extends AbstractFaker
{
    protected $userRepository;
    protected $specificationRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->specificationRepository = new SpecificationRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/information/information.php';
    }

    protected function beforeGenerate()
    {
        $this->generateAuthorId();
        $this->buildResourceId('specification_id', $this->specificationRepository);
    }
    
    protected function afterGenerate()
    {
        $this->generateSpecificationName();
        $this->generateAttribute('value');
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'information_author_ids', 5);
    }

    private function generateSpecificationName()
    {
        $this->specification_name = $this->specificationRepository->find($this->specification_id)?->name;
    } 
}