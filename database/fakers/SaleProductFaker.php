<?php

namespace Database\Fakers;

use Modules\Product\Repositories\ProductRepository;
use Modules\Sale\Repositories\SaleRepository;
use Modules\User\Repositories\UserRepository;

class SaleProductFaker extends AbstractFaker
{
    protected $userRepository;
    protected $productRepository;
    protected $saleRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->productRepository = new ProductRepository;
        $this->saleRepository = new SaleRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/sale_product/sale_product.php';
    }
    
    protected function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateTargetId();
        $this->generateSaleId();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'sale_product_author_ids', 10);
    }

    private function generateTargetId()
    {
        $this->target_id = $this->getResourceId($this->productRepository, 'sale_product_target_ids');
    }

    private function generateSaleId()
    {
        $this->sale_id = $this->getResourceId($this->saleRepository, 'sale_product_sale_ids', 3);
    }
}