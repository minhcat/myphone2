<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class SpecificationFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/specification/specification.php';
    }

    public function beforeGenerate()
    {
        $this->generateAuthorId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'specification_author_ids');
    }
}