<?php

namespace Database\Fakers;

use Modules\Brand\Repositories\BrandRepository;
use Modules\User\Repositories\UserRepository;

class ProductFaker extends AbstractFaker
{
    protected $brandRepository;
    protected $userRepository;

    public function __construct()
    {
        $this->brandRepository = new BrandRepository;
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/product/product.php';
    }

    public function generate()
    {
        $this->generateBrandId();
        $this->generateBrandName();
        $this->generateAuthorId();

        parent::generate();

        $this->generateSlug();
        $this->generateSKUNumber();
    }

    protected function generateBrandId()
    {
        $this->brand_id = $this->getResourceId($this->brandRepository, 'product_brand_ids', 5);
    }

    protected function generateBrandName()
    {
        $this->brand_name = $this->brandRepository->find($this->brand_id)?->name;
    }

    protected function generateSlug()
    {
        $this->slug = str_replace(' ', '-', strtolower(trim($this->name)));
    }

    protected function generateSKUNumber()
    {
        $session_sku_number = 1;
        if (session()->has('product_sku_number')) {
            $session_sku_number = session()->get('product_sku_number');
        }

        $this->sku_number =  sprintf('%04d', $session_sku_number);

        session()->put('product_sku_number', $session_sku_number + 1);
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'product_user_ids', 5);
    }
}