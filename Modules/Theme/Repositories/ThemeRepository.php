<?php

namespace Modules\Theme\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Theme\Entities\Theme;

class ThemeRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Theme();
    }

    public function update($id, $data, $more = [])
    {
        $theme = parent::update($id, $data, $more);

        $active_value = !$theme->is_active;

        $themes = $this->model->all();

        foreach ($themes as $other_theme) {
            if ($other_theme->id !== $theme->id) {
                $other_theme->update(['is_active' => $active_value]);
            }
        }

        return $theme;
    }
}