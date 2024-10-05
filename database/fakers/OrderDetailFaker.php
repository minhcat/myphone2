<?php

namespace Database\Fakers;

use Modules\Order\Repositories\OrderRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\User\Repositories\UserRepository;

class OrderDetailFaker extends AbstractFaker
{
    protected $userRepository;
    protected $orderRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->orderRepository = new OrderRepository;
        $this->productRepository = new ProductRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/order_detail/order_detail.php';
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateOrderId();
        $this->generateTargetId();
        $this->generatePrice();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'order_detail_author_ids', 6);
    }

    protected function generateOrderId()
    {
        $this->order_id = $this->getResourceId($this->orderRepository, 'order_detail_order_ids', 3);
    }

    protected function generateTargetId()
    {
        $this->target_id = $this->getResourceId($this->productRepository, 'order_detail_target_ids');

        if ($this->target_id === null) {
            session()->forget('order_detail_target_ids');
            $this->target_id = $this->getResourceId($this->productRepository, 'order_detail_target_ids');
        }
    }

    protected function generatePrice()
    {
        $target = $this->productRepository->find($this->target_id);
        $this->price = $target->price;
    }
}