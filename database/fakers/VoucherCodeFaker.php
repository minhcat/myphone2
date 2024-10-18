<?php

namespace Database\Fakers;

use Modules\Voucher\Repositories\VoucherRepository;

class VoucherCodeFaker extends AbstractFaker
{
    protected $voucherRepository;

    public function __construct()
    {
        $this->voucherRepository = new VoucherRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/voucher_code/voucher_code.php';
    }
    
    protected function afterGenerate()
    {
        $this->generateVoucherId();
        $this->generateCode();
    }

    private function generateVoucherId()
    {
        $this->voucher_id = $this->getResourceId($this->voucherRepository, 'voucher_code_voucher_ids', 10);
    }

    private function generateCode()
    {
        $this->code = str_rand(3).rand(1000, 9999);
    }
}