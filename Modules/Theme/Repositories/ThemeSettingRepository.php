<?php

namespace Modules\Theme\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Theme\Entities\ThemeSetting;

class ThemeSettingRepository extends AbstractRepository
{
    public function getModel()
    {
        return new ThemeSetting();
    }

    protected function convertDataUpdate($data, $more = [])
    {
        if (array_key_exists('sidebar_collapse', $data) && $data['sidebar_collapse'] === 'on') {
            $data['sidebar_collapse'] = true;
        } else {
            $data['sidebar_collapse'] = false;
        }

        return parent::convertDataUpdate($data, $more);
    }

    
    public function update($id, $data, $more = [])
    {
        $data = $this->convertDataUpdate($data, $more);

        $model = $this->model->where('theme_id', $id)->first();

        $model->update($data);

        return $model;
    }
}