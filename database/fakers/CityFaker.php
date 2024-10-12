<?php

namespace Database\Fakers;

use Modules\User\Repositories\UserRepository;

class CityFaker extends AbstractFaker
{
    protected $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/city/city.php';
    }

    protected function getTerritoryData($file)
    {
        return require database_path().'/fakers/Data/city/data/'.$file.'.php';
    }

    public function beforeGenerate()
    {
        $this->buildNameAttribute();
        $this->buildShortnameAttribute();
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'city_author_ids');
    }

    protected function buildNameAttribute()
    {
        $data = $this->getTerritoryData('name');

        $cities = [];
        foreach ($data as $city_name => $item) {
            $cities[] = [
                'value'     => $city_name,
                'rate'      => 1,
                'max'       => 1,
            ];
        }

        $this->attribute('name')->setValueData(['values' => $cities]);
    }

    protected function buildShortnameAttribute()
    {
        $data = $this->getTerritoryData('shortname');

        $cities = [];
        foreach ($data as $city_shortname => $item) {
            $cities[] = [
                'value'     => $city_shortname,
                'rate'      => 1,
                'max'       => 1,
            ];
        }

        $this->attribute('shortname')->setValueData(['values' => $cities]);
    }
}