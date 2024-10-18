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

    protected function getData()
    {
        return require database_path().'/fakers/Data/transporter/transporter.php';
    }

    protected function afterGenerate()
    {
        $this->generateAuthorId();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'transporter_author_ids', 20);
    }
}