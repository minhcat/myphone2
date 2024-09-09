<?php

namespace Database\Fakers;

class UserFaker extends AbstractFaker
{
    public function getData()
    {
        return require database_path().'/fakers/Data/user/user.php';
    }

    public function generate()
    {
        parent::generate();

        $this->generateAccount();
        $this->generateEmail();
    }

    protected function generateAccount()
    {
        $firstname = $this->getBasicName('firstname');
        $lastname  = $this->getBasicName('lastname');
    
        $account_basic = $lastname.$firstname;
        $account = $this->makeUniqueValue($account_basic, 'user_accounts');

        $this->account = $account;
    }

    protected function generateEmail()
    {
        $firstname = $this->getBasicName('firstname');
        $lastname  = $this->getBasicName('lastname');
    
        $email_basic = $lastname.'.'.$firstname;
        $email = $this->makeUniqueValue($email_basic, 'user_emails');

        $this->email = $email.'@myphone.com';
    }

    private function getBasicName($type)
    {
        if ($type == 'firstname') {
            $array = explode(' ', $this->firstname);
            $name  = $array[0];
        } else {
            $array = explode(' ', $this->lastname);
            $name  = $array[count($array) - 1];
        }

        return strtolower(convert_vn2latin($name));
    }

    private function makeUniqueValue($basic_value, $session_name)
    {
        $session_array = [];
        $value = $basic_value;

        if (session()->has($session_name)) {
            $session_array = session()->get($session_name);
        }

        while (array_search($value, $session_array) !== false) {
            $value = $basic_value . rand(10, 99);
        }

        $session_array[] = $value;
        session()->put($session_name, $session_array);

        return $value;
    }
}