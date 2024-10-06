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

    public function getData()
    {
        return require database_path().'/fakers/Data/invoice/invoice.php';
    }
    
    public function afterGenerate()
    {
        $this->generateCode();
        $this->generateAuthorId();
        $this->generateAddressId();
        $this->generateTransporterCaseId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'invoice_author_ids', 2);
    }

    protected function generateAddressId()
    {
        $addresses = $this->addressRepository->get([['author_id', $this->author_id]]);
        $this->address_id = $addresses->random()->id;
    }

    protected function generateTransporterCaseId()
    {
        $this->transporter_case_id = $this->getResourceId($this->transporterCaseRepository, 'invoice_transporter_case_ids', 15);
    }

    protected function generateCode()
    {
        $code = session()->get('invoice.code.value', 1000);
        $this->code = '#' . ($code + 1);
        session()->put('invoice.code.value', $code + 1);
    }
}