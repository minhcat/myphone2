<?php

namespace Database\Fakers;

use Modules\Invoice\Repositories\InvoiceRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\User\Repositories\UserRepository;

class InvoiceDetailFaker extends AbstractFaker
{
    protected $userRepository;
    protected $invoiceRepository;
    protected $productRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->invoiceRepository = new InvoiceRepository;
        $this->productRepository = new ProductRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/invoice_detail/invoice_detail.php';
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateInvoiceId();
        $this->generateTargetId();
        $this->generatePrice();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'invoice_detail_author_ids', 6);
    }

    protected function generateInvoiceId()
    {
        $this->invoice_id = $this->getResourceId($this->invoiceRepository, 'invoice_detail_order_ids', 3);
    }

    protected function generateTargetId()
    {
        $this->target_id = $this->getResourceId($this->productRepository, 'invoice_detail_target_ids');

        if ($this->target_id === null) {
            session()->forget('invoice_detail_target_ids');
            $this->target_id = $this->getResourceId($this->productRepository, 'invoice_detail_target_ids');
        }
    }

    protected function generatePrice()
    {
        $target = $this->productRepository->find($this->target_id);
        $this->price = $target->price;
    }
}