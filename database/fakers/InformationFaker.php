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

    public function getData()
    {
        return require database_path().'/fakers/Data/information/information.php';
    }

    public function beforeGenerate()
    {
        $this->generateAuthorId();
        $this->buildResourceId($this->specificationRepository, 'specification_id');
    }
    
    public function afterGenerate()
    {
        $this->generateSpecificationName();
        $this->generateAttribute('value');
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'information_author_ids', 5);
    }

    protected function generateSpecificationId()
    {
        $this->specification_id = $this->getResourceId($this->specificationRepository, 'information_specification_ids');
    }

    protected function generateSpecificationName()
    {
        $this->specification_name = $this->specificationRepository->find($this->specification_id)?->name;
    } 
}