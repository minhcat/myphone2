<?php

namespace Database\Fakers;

use Modules\City\Repositories\WardRepository;
use Modules\User\Repositories\UserRepository;

class AddressFaker extends AbstractFaker
{
    protected $wardRepository;
    protected $userRepository;

    public function __construct()
    {
        $this->wardRepository = new WardRepository;
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/address/address.php';
    }

    public function generate()
    {
        parent::generate();

        $this->generateContent();

        $this->generateAuthorId();

        $this->generateWardId();
    }

    protected function generateContent()
    {
        $this->content = rand(1, 150). ' ' . $this->content;
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'address_author_ids', 2);
    }

    protected function generateWardId()
    {
        $this->ward_id = $this->getResourceId($this->wardRepository, 'address_ward_ids', 10);
    }
}