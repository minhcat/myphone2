<?php

namespace Database\Fakers;

use Modules\Area\Repositories\AreaRepository;
use Modules\User\Repositories\UserRepository;

class AreaDetailFaker extends AbstractFaker
{
    protected $userRepository;
    protected $areaRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->areaRepository = new AreaRepository;

        return parent::__construct();
    }

    protected function getData()
    {
        return require database_path().'/fakers/Data/area_detail/area_detail.php';
    }

    protected function beforeGenerate()
    {
        $this->buildResourceId('area_id', $this->areaRepository);
        $this->buildResourceId('territory_id');
    }

    protected function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateAreaName();
        $this->generateAttribute('territory_type');
        $this->generateAttribute('territory_id');
    }

    private function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'area_detail_author_ids', 2);
    }

    private function generateAreaName()
    {
        $this->area_name = $this->areaRepository->find($this->area_id)?->name;
    }
}
