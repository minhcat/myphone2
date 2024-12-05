<?php

namespace Modules\Config\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Config\Entities\Config;

class ConfigRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Config();
    }

    protected function convertDataCreate($data, $more = [])
    {
        if (array_key_exists('value_null', $data) && $data['value_null'] == 'on') {
            $data['value'] = null;
        }
        if (array_key_exists('group_null', $data) && $data['group_null'] == 'on') {
            $data['group'] = null;
        }

        return parent::convertDataCreate($data, $more);
    }
}