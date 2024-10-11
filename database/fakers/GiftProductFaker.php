<?php

namespace Database\Fakers;

use Modules\Gift\Repositories\GiftRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\User\Repositories\UserRepository;

class GiftProductFaker extends AbstractFaker
{
    protected $userRepository;
    protected $productRepository;
    protected $giftRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->productRepository = new ProductRepository;
        $this->giftRepository = new GiftRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/gift_product/gift_product.php';
    }
    
    public function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateTargetId();
        $this->generateGiftId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'gift_product_author_ids', 10);
    }

    protected function generateTargetId()
    {
        $this->target_id = $this->getResourceId($this->productRepository, 'gift_product_target_ids');
    }

    protected function generateGiftId()
    {
        $this->gift_id = $this->getResourceId($this->giftRepository, 'gift_product_gift_ids', 3);
    }
}