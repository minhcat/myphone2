<?php

namespace Database\Fakers;

use Modules\Product\Repositories\ProductRepository;
use Modules\Specification\Repositories\SpecificationRepository;
use Modules\User\Repositories\UserRepository;

class DetailFaker extends AbstractFaker
{
    protected $userRepository;
    protected $specificationRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->specificationRepository = new SpecificationRepository;
        $this->productRepository = new ProductRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/detail/detail.php';
    }

    public function beforeGenerate()
    {
        $this->generateAuthorId();
        $this->generateProductId();
        $this->generateSpecificationId();
        $this->generateInformationId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'detail_author_ids', 32);
    }

    protected function generateProductId()
    {
        $this->product_id = $this->getResourceId($this->productRepository, 'detail_product_ids', 8);
    }

    protected function generateSpecificationId()
    {
        $specifications = $this->specificationRepository->all();
        foreach ($specifications as $specification) {
            $session_name = 'detail.spec.'.$this->product_id.'.'.$specification->id.'.check';
            $check_spec = session($session_name, true);
    
            if ($check_spec) {
                $this->specification_id = $specification->id;
                session()->put($session_name, false);
                break;
            }
        }
    }

    protected function generateInformationId()
    {
        $specification = $this->specificationRepository->find($this->specification_id);
        $informations = optional($specification)->informations;

        if ($informations !== null) {
            $information = $informations->random();
            $this->information_id = $information->id;
        }
    }
}