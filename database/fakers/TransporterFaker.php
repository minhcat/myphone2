<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class TransporterFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/transporter/transporter.php';
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'transporter_author_ids', 20);
    }
}