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
}