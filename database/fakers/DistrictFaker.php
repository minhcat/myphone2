<?php

namespace Database\Fakers;

use Modules\City\Repositories\CityRepository;
use Modules\User\Repositories\UserRepository;

class DistrictFaker extends AbstractFaker
{
    protected $userRepository;
    protected $cityRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->cityRepository = new CityRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/district/district.php';
    }

    protected function getTerritoryData($file)
    {
        return require database_path().'/fakers/Data/city/data/'.$file.'.php';
    }

    public function beforeGenerate()
    {
        $this->buildNameAttribute();
        $this->buildShortnameAttribute();
        $this->buildCityIdAttribute();
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'district_author_ids');
    }

    protected function buildCityIdAttribute()
    {
        $data = $this->getTerritoryData('name');

        $cities = [];
        foreach ($data as $city_name => $items) {
            $cities[] = [
                'value'             => null,
                'rate'              => 1,
                'max'               => count($items),
                'conditions'        => [
                    [
                        'column'    => 'name',
                        'value'     => $city_name

                    ]
                ]
            ];
        }

        $this->attribute('city_id')->setValueData(['values' => $cities]);
        $this->buildResourceId($this->cityRepository, 'city_id');
    }

    protected function buildNameAttribute()
    {
        $data = $this->getTerritoryData('name');

        $districts = [];
        foreach ($data as $items) {
            foreach ($items as $district_name => $item) {
                $districts[] = [
                    'value'     => $district_name,
                    'rate'      => 1,
                    'max'       => 1,
                ];
            }
        }

        $this->attribute('name')->setValueData(['values' => $districts]);
    }

    protected function buildShortnameAttribute()
    {
        $data = $this->getTerritoryData('shortname');

        $districts = [];
        foreach ($data as $items) {
            foreach ($items as $district_shortname => $item) {
                $districts[] = [
                    'value'     => $district_shortname,
                    'rate'      => 1,
                    'max'       => 1,
                ];
            }
        }

        $this->attribute('shortname')->setValueData(['values' => $districts]);
    }
}