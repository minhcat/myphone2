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
        $this->author_id = $this->getRandomResourceId($this->userRepository, 'address_author_ids');
    }

    protected function generateWardId()
    {
        $this->ward_id = $this->getRandomResourceId($this->wardRepository, 'address_ward_ids');
    }

    private function getRandomResourceId($repository, $session_name)
    {
        $session_array = [];
        if (session()->has($session_name)) {
            $session_array = session()->get($session_name);
        }

        $models = $repository->all();
        $models_not_choose = $models->whereNotIn('id', $session_array)->values();
        $model_ids = $models_not_choose->pluck('id');

        $max = $model_ids->count() - 1;
        $rand = rand(0, $max);
        $id = $models_not_choose[$rand]->id;

        $session_array[] = $id;
        session()->put($session_name, $session_array);

        return $id;
    }
}