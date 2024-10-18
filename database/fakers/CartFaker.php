<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class CartFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/cart/cart.php';
    }

    protected function afterGenerate()
    {
        $this->generateCode();
        $this->generateAuthorId();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'cart_author_ids');
    }

    private function generateCode()
    {
        $code = session()->get('cart.code.value', 1000);
        $this->code = '#' . ($code + 1);
        session()->put('cart.code.value', $code + 1);
    }
}