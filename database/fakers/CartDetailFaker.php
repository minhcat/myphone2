<?php

namespace Database\Fakers;

use Modules\Cart\Repositories\CartRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\User\Repositories\UserRepository;

class CartDetailFaker extends AbstractFaker
{
    protected $userRepository;
    protected $cartRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->cartRepository = new CartRepository;
        $this->productRepository = new ProductRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/cart_detail/cart_detail.php';
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateCartId();
        $this->generateTargetId();
        $this->generatePrice();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'cart_detail_author_ids', 3);
    }

    protected function generateCartId()
    {
        $this->cart_id = $this->getResourceId($this->cartRepository, 'cart_detail_cart_ids', 3);
    }

    protected function generateTargetId()
    {
        $this->target_id = $this->getResourceId($this->productRepository, 'cart_detail_target_ids');
    }

    protected function generatePrice()
    {
        $target = $this->productRepository->find($this->target_id);
        $this->price = $target->price;
    }
}