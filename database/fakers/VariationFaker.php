<?php

namespace Database\Fakers;

use Modules\Product\Repositories\ProductRepository;
use Modules\User\Repositories\UserRepository;

class VariationFaker extends AbstractFaker
{
    protected $userRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->productRepository = new ProductRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/variation/variation.php';
    }

    protected function beforeGenerate()
    {
        $this->generateAuthorId();
        $this->generateProductId();
    }
    
    protected function afterGenerate()
    {
        $this->generatePrice();
        $this->generateCode();
    }

    private function generateCode()
    {
        $code = session()->get('variation.code.value', 1000);
        $this->code = '#' . ($code + 1);
        session()->put('variation.code.value', $code + 1);
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'variation_author_ids', 10);
    }

    private function generateProductId()
    {
        $this->product_id = $this->getResourceId($this->productRepository, 'variation_product_ids', 36);
    }

    private function generatePrice()
    {
        $product_price = $this->productRepository->find($this->product_id)->price;
        $price = ($this->price / 100) * $product_price;
        if ($price <= 100000) {
            $price = round($price, -4);
        } elseif ($price <= 1000000) {
            $price = round($price, -5);
        } elseif ($price <= 10000000) {
            $price = round($price, -6);
        } elseif ($price <= 100000000) {
            $price = round($price, -7);
        } else {
            $price = round($price, -8);
        }

        $this->price = $price + $product_price;
    }
}