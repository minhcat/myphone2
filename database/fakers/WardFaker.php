<?php

namespace Database\Fakers;

use Modules\City\Repositories\DistrictRepository;
use Modules\User\Repositories\UserRepository;

class WardFaker extends AbstractFaker
{
    protected $userRepository;
    protected $districtRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->districtRepository = new DistrictRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/ward/ward.php';
    }

    protected function getTerritoryData($file)
    {
        return require database_path().'/fakers/Data/city/data/'.$file.'.php';
    }

    public function beforeGenerate()
    {
        $this->buildNameAttribute();
        $this->buildShortnameAttribute();
        $this->buildDistrictIdAttribute();
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'ward_author_ids', 20);
    }

    protected function buildDistrictIdAttribute()
    {
        $data = $this->getTerritoryData('name');

        $districts = [];
        foreach ($data as $datum) {
            foreach ($datum as $district_name => $items) {
                $districts[] = [
                    'value'             => null,
                    'rate'              => 1,
                    'max'               => count($items),
                    'conditions'        => [
                        [
                            'column'    => 'name',
                            'value'     => $district_name
                        ]
                    ]
                ];
            }
        }

        $this->attribute('district_id')->setValueData(['values' => $districts]);
        $this->buildResourceId($this->districtRepository, 'district_id');
    }

    protected function buildNameAttribute()
    {
        $data = $this->getTerritoryData('name');

        $wards = [];
        $index = 0;
        foreach ($data as $datum) {
            foreach ($datum as $items) {
                foreach ($items as $ward_name) {
                    $index ++;
                    $wards[] = [
                        'id'        => $index,
                        'value'     => $ward_name,
                        'rate'      => 1,
                        'max'       => 1,
                    ];
                }
            }
        }

        $this->attribute('name')->setValueData(['values' => $wards]);
    }

    protected function buildShortnameAttribute()
    {
        $data = $this->getTerritoryData('shortname');

        $wards = [];
        $index = 0;
        foreach ($data as $datum) {
            foreach ($datum as $items) {
                foreach ($items as $ward_shortname) {
                    $index ++;
                    $wards[] = [
                        'id'        => $index,
                        'value'     => $ward_shortname,
                        'rate'      => 1,
                        'max'       => 1,
                    ];
                }
            }
        }

        $this->attribute('shortname')->setValueData(['values' => $wards]);
    }
}