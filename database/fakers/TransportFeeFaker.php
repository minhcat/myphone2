<?php

namespace Database\Fakers;

use App\Enums\TotalRangeType;
use Modules\Area\Repositories\AreaRepository;
use Modules\Transporter\Repositories\TransporterCaseRepository;
use Modules\Transporter\Repositories\TransporterRepository;
use Modules\User\Repositories\UserRepository;

class TransportFeeFaker extends AbstractFaker
{
    protected $userRepository;
    protected $areaRepository;
    protected $transporterCaseRepository;
    protected $transporterRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
        $this->areaRepository = new AreaRepository;
        $this->transporterCaseRepository = new TransporterCaseRepository;
        $this->transporterRepository = new TransporterRepository;

        return parent::__construct();
    }

    public function getData()
    {
        return require database_path().'/fakers/Data/transport_fee/transport_fee.php';
    }

    public function beforeGenerate()
    {
        $this->buildResourceId('transporter_id', $this->transporterRepository);
    }

    public function afterGenerate()
    {
        $this->generateAuthorId();
        $this->generateAreaId();
        $this->generateName();
        $this->generateTransporterCaseId();
        $this->generateRange();
        $this->generateCost();
    }

    protected function generateAuthorId()
    {
        $this->author_id = $this->getResourceId($this->userRepository, 'transport_fee_author_ids', 20);
    }

    protected function generateAreaId()
    {
        reset_session('transport_fee_area_ids', 18);
        $this->area_id = $this->getResourceId($this->areaRepository, 'transport_fee_area_ids', 3);
    }

    protected function generateTransporterCaseId()
    {
        reset_session('transport_fee_transporter_case_ids', 54);
        $this->transporter_case_id = $this->getResourceId($this->transporterCaseRepository, 'transport_fee_transporter_case_ids', 18, [['transporter_id', $this->transporter_id]]);
    }

    protected function generateName()
    {
        $session_name = 'transport_fee.index.' . $this->name . '.value';
        $index = session()->get($session_name, 1);
        $this->name .= ' ' . str_pad($index, 3, '0', STR_PAD_LEFT);
        session()->put($session_name, $index + 1);
    }

    protected function generateRange()
    {
        reset_time_of_use_attribute_session($this, $this->attribute('range'), 3);
        $this->generateAttribute('range');
        $this->setRange($this->range);
    }

    private function setRange($range)
    {
        if ($range === null) {
            return;
        }

        $range_bottom_type_str = substr($range, 0, 1);
        $range_top_type_str = substr($range, -1, 1);

        $range = str_replace('[', '', $range);
        $range = str_replace(']', '', $range);
        $range = str_replace('(', '', $range);
        $range = str_replace(')', '', $range);

        $range_split = explode(',', $range);

        $range_bottom_value = null;
        if ($range_split[0] !== 'inf') {
            $range_bottom_value = intval($range_split[0]);
        }
        $range_top_value = null;
        if ($range_split[1] !== 'inf') {
            $range_top_value = intval($range_split[1]);
        }

        $this->total_range_bottom_type = $range_bottom_type_str === '[' ? TotalRangeType::EQUAL : TotalRangeType::NOT_EQUAL;
        $this->total_range_top_type = $range_top_type_str === '[' ? TotalRangeType::EQUAL : TotalRangeType::NOT_EQUAL;
        $this->total_range_bottom = $range_bottom_value;
        $this->total_range_top = $range_top_value;
    }

    private function generateCost()
    {
        $cost = 80000;
        if ($this->range === '[1000000,5000000)') {
            $cost *= 0.5;
        } elseif ($this->range === '[5000000,inf)') {
            $cost = 0;
        }

        $area_name = $this->areaRepository->find($this->area_id)?->name;
        if (str_contains($area_name, 'Nội Thành')) {
            $cost *= 0.5;
        } elseif (str_contains($area_name, 'Tỉnh Gần')) {
            $cost *= 2;
        }

        $case_name = $this->transporterCaseRepository->find($this->transporter_case_id)?->name;
        if ($case_name == 'Cheap') {
            $cost *= 0.5;
        } elseif ($case_name == 'Fast') {
            $cost *= 3;
        }

        if (str_contains($this->name, 'GiaoHangNhanh')) {
            $cost += 5000;
        } elseif (str_contains($this->name, 'J&T Express')) {
            $cost -= 5000;
        }

        $this->cost = max($cost, 0);
    }
}