<?php

namespace Database\Fakers;

use Modules\Transporter\Repositories\TransporterCaseRepository;
use Modules\User\Repositories\AddressRepository;
use Modules\User\Repositories\UserRepository;

class PromotionFaker extends AbstractFaker
{
    protected $userRepository;
    protected $transporterCaseRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->transporterCaseRepository = new TransporterCaseRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/promotion/promotion.php';
    }
    
    protected function afterGenerate()
    {
        $this->generateAuthorId();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'promotion_author_ids', 10);
    }
}