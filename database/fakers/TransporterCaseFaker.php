<?php

namespace Database\Fakers;

use Modules\Transporter\Repositories\TransporterRepository;
use Modules\User\Repositories\UserRepository;

class TransporterCaseFaker extends AbstractFaker
{
    protected $userRepository;
    protected $transporterRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->transporterRepository = new TransporterRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/transporter_case/transporter_case.php';
    }

    public function beforeGenerate()
    {
        reset_time_of_use_session($this, 3);
        $this->generateAuthorId();
        $this->generateTransporterId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'transporter_case_author_ids', 20);
    }
    
    protected function generateTransporterId()
    {
        $this->transporter_id = $this->getResourceId($this->transporterRepository, 'transporter_case_transporter_ids', 3);
    }
}