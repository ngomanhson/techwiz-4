<?php

namespace App\Repositories\User;

use App\Repositories\BaseRepositories;

class UserRepository extends BaseRepositories implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }

}
