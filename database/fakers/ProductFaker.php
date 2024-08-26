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

        $data = config('faker.product');
        return parent::__construct($data);
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
        $this->brand_id = $this->getRandomResourceId($this->brandRepository, 'product_brand_ids', 5);
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
        $this->author_id = $this->getRandomResourceId($this->userRepository, 'product_user_ids', 5);
    }

    private function getRandomResourceId($repository, $session_name, $max_quantity = 1)
    {
        $session_array = [];
        if (session()->has($session_name)) {
            $session_array = session()->get($session_name);
        }
        $session_ids = array_filter($session_array, function($item) use ($max_quantity) {
            if ($item[1] >= $max_quantity) {
                return $item[0];
            }
        });

        $models = $repository->all();
        $models_not_choose = $models->whereNotIn('id', $session_ids)->values();
        $model_ids = $models_not_choose->pluck('id');

        $max = $model_ids->count() - 1;
        $rand = rand(0, $max);
        $id = $models_not_choose[$rand]->id;
        $quantity = array_values(array_filter($session_array, function($item) use ($id) {
            if ($item[0] == $id) {
                return $item[1];
            }
        }));
        $quantity = count($quantity) > 0 ? $quantity[0] : 1;

        $session_array[] = [$id, $quantity];
        session()->put($session_name, $session_array);

        return $id;
    }
}