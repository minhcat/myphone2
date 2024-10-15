<?php

namespace Database\Fakers;

use Modules\Gift\Repositories\GiftProductRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\User\Repositories\UserRepository;

class GiftProductItemFaker extends AbstractFaker
{
    protected $userRepository;
    protected $productRepository;
    protected $giftProductRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->productRepository = new ProductRepository;
        $this->giftProductRepository = new GiftProductRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/gift_product_item/gift_product_item.php';
    }

    public function beforeGenerate()
    {
        reset_time_of_use_session($this, 2);
        $this->buildResourceId('target_id', $this->productRepository);
    }
    
    public function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateGiftProductId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'gift_product_item_author_ids', 10);
    }

    protected function generateGiftProductId()
    {
        $this->gift_product_id = $this->getResourceId($this->giftProductRepository, 'gift_product_item_gift_product_ids', 2);
    }
}