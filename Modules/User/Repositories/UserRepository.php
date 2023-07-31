<?php

namespace Modules\User\Repositories;

use App\Repositories\AbstractRepository;
use Modules\User\Entities\User;

class UserRepository extends AbstractRepository
{
    function getModel()
    {
        return new User();
    }
}