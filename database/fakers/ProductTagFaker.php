<?php

namespace Database\Fakers;

use Database\Fakers\Contracts\ConditionGenerationContract;
use Database\Fakers\Traits\ConditionGeneration;
use Modules\Product\Repositories\ProductRepository;
use Modules\Specification\Repositories\InformationRepository;
use Modules\Tag\Repositories\TagRepository;

class ProductTagFaker extends AbstractFaker implements ConditionGenerationContract
{
    use ConditionGeneration;

    protected $productRepository;
    protected $tagRepository;
    protected $informationRepository;

    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->tagRepository = new TagRepository();
        $this->informationRepository = new InformationRepository();

        parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/product_tag/product_tag.php';
    }

    public function getConditionData()
    {
        return require database_path().'/fakers/Data/product_tag/data/conditions.php';
    }

    public function getFakerName()
    {
        return 'product_tag';
    }

    public function getResourceRepository1()
    {
        return $this->productRepository;
    }

    public function getResourceRepository2()
    {
        return $this->tagRepository;
    }

    public function getAttributeName1()
    {
        return 'product_id';
    }

    public function getAttributeName2()
    {
        return 'tag_id';
    }

    protected function beforeGenerate()
    {
        $this->conditionGenerate($this->productRepository, $this->tagRepository);
        $this->generateWithPrice();
        $this->generateWithWeight();
    }

    private function generateWithPrice()
    {
        if ($this->product_id === null || $this->tag_id === null) {
            $products = $this->productRepository->all();
            foreach ($products as $product) {
                if ($product->price <= 10000000) {
                    $tag_name = 'cheap';
                } else {
                    $tag_name = 'expensive';
                }
                $tag = $this->tagRepository->first([['name', $tag_name]]);
                $session_name = 'product_tag.check_exist.'.$product->id.'.'.$tag->id;
                $check_exist = session()->get($session_name, true);
                if ($check_exist) {
                    $this->product_id = $product->id;
                    $this->tag_id = $tag->id;
                    session()->put($session_name, false);
                    break;
                }
            }
        }
    }

    private function generateWithWeight()
    {
        if ($this->product_id === null || $this->tag_id === null) {
            $products = $this->productRepository->all();
            $tag = $this->tagRepository->first([['name', 'lightweight']]);
            $informations = $this->informationRepository->getWhereIn('value', ['100 g', '150 g', '200 g', '220 g', '1.7 kg']);
            $information_ids = $informations->pluck('id')->toArray();

            foreach ($products as $product) {
                $session_name = 'product_tag.check_exist.'.$product->id.'.'.$tag->id;
                $check_exist = session()->get($session_name, true);
                if ($check_exist) {
                    foreach ($product->details as $detail) {
                        if (array_search($detail->information->id, $information_ids) !== false) {
                            $this->product_id = $product->id;
                            $this->tag_id = $tag->id;
                            session()->put($session_name, false);
                            break 2;
                        }
                    }
                }
            }
        }
    }
}
