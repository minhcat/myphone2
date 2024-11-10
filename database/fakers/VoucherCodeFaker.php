<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;
use Modules\Voucher\Repositories\VoucherRepository;

class VoucherCodeFaker extends AbstractFaker
{
    protected $voucherRepository;
    protected $userRepository;

    public function __construct()
    {
        $this->voucherRepository = new VoucherRepository;
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/voucher_code/voucher_code.php';
    }
    
    protected function afterGenerate()
    {
        $this->generateVoucherId();
        $this->generateAuthorId();
        $this->generateCode();
    }

    private function generateVoucherId()
    {
        $this->voucher_id = $this->getResourceId($this->voucherRepository, 'voucher_code_voucher_ids', 10);
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'voucher_code_author_ids', 10);
    }

    private function generateCode()
    {
        $this->code = str_rand(3).rand(1000, 9999);
    }
}