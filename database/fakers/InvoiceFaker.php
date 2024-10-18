<?php

namespace Database\Fakers;

use Modules\Transporter\Repositories\TransporterCaseRepository;
use Modules\User\Repositories\AddressRepository;
use Modules\User\Repositories\UserRepository;

class InvoiceFaker extends AbstractFaker
{
    protected $userRepository;
    protected $addressRepository;
    protected $transporterCaseRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->addressRepository = new AddressRepository;
        $this->transporterCaseRepository = new TransporterCaseRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/invoice/invoice.php';
    }
    
    protected function afterGenerate()
    {
        $this->generateCode();
        $this->generateAuthorId();
        $this->generateAddressId();
        $this->generateTransporterCaseId();
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'invoice_author_ids', 2);
    }

    private function generateAddressId()
    {
        $addresses = $this->addressRepository->get([['author_id', $this->author_id]]);
        $this->address_id = $addresses->random()->id;
    }

    private function generateTransporterCaseId()
    {
        $this->transporter_case_id = $this->getResourceId($this->transporterCaseRepository, 'invoice_transporter_case_ids', 15);
    }

    private function generateCode()
    {
        $code = session()->get('invoice.code.value', 1000);
        $this->code = '#' . ($code + 1);
        session()->put('invoice.code.value', $code + 1);
    }
}