<?php

namespace Modules\Tag\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Tag\Entities\Tag;

class TagRepository extends AbstractRepository
{
    public function getModel()
    {
        return new Tag();
    }
}