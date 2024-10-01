<?php

namespace Database\Fakers;

use Database\Fakers\Contracts\ConditionGenerationContract;
use Database\Fakers\Traits\ConditionGeneration;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Product\Repositories\ProductRepository;

class CategoryProductFaker extends AbstractFaker implements ConditionGenerationContract
{
    use ConditionGeneration;

    protected $productRepository;
    protected $categoryRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->categoryRepository = new CategoryRepository();

        parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/category_product/category_product.php';
    }

    public function getConditionData()
    {
        return require database_path().'/fakers/Data/category_product/data/conditions.php';
    }

    public function getFakerName()
    {
        return 'category_produt';
    }

    public function getResourceRepository1()
    {
        return $this->productRepository;
    }

    public function getResourceRepository2()
    {
        return $this->categoryRepository;
    }

    public function getAttributeName1()
    {
        return 'product_id';
    }

    public function getAttributeName2()
    {
        return 'category_id';
    }

    public function beforeGenerate()
    {
        $this->conditionGenerate($this->productRepository, $this->categoryRepository);
    }
}