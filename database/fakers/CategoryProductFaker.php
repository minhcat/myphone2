<?php

namespace Database\Fakers;

use Modules\Category\Repositories\CategoryRepository;
use Modules\Product\Repositories\ProductRepository;

class CategoryProductFaker extends AbstractFaker
{
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

    public function beforeGenerate()
    {
        $data = $this->getConditionData();
        $products = $this->productRepository->all();

        foreach ($products as $product) {
            foreach ($data as $cate_name => $cate) {
                if (!$this->checkExist($cate_name, $product)) {
                    continue;
                }

                if (!$this->checkCate('has', $cate, $product)) {
                    continue;
                }

                if (!$this->checkCate('not', $cate, $product)) {
                    continue;
                }
    
                $this->generateData($cate_name, $product);
                break 2;
            }
        }
    }

    private function checkCate($type, $cate, $product) {
        $data = array_get($type, $cate, []);
        $check = false;
        foreach ($data as $names) {
            $check = false;
            foreach ($names as $name) {
                if (is_array($name)) {
                    foreach ($name as $_name) {
                        $check = false;
                        if (is_array($_name)) {
                            foreach ($_name as $__name) {
                                if (strpos($product->name, $__name) !== false) {
                                    $check = true;
                                    break 3;
                                }
                            }
                        } elseif (strpos($product->name, $_name) !== false) {
                            $check = true;
                            continue;
                        }
                        if (!$check) {
                            break;
                        }
                    }
                    if ($check) {
                        break;
                    }
                } elseif (strpos($product->name, $name) !== false) {
                    $check = true;
                    break;
                }
            }
            if (!$check) {
                break;
            }
        }

        return $type === 'not' ? !$check : $check;
    }

    private function checkExist($cate_name, $product)
    {
        $category_id = $this->categoryRepository->first([['name', $cate_name]])->id;
        $session_name = 'category_product.check_exist.'.$product->id.'.'.$category_id;
        return session()->get($session_name, true);
    }

    private function generateData($cate_name, $product) {
        $category_id = $this->categoryRepository->first([['name', $cate_name]])->id;
        $session_name = 'category_product.check_exist.'.$product->id.'.'.$category_id;
        $this->product_id = $product->id;
        $this->category_id = $category_id;
        session()->put($session_name, false);
    }
}