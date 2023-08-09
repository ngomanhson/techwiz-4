<?php

namespace App\Repositories\ProductTag;

use App\Repositories\BaseRepositories;

class ProductTagRepository extends BaseRepositories implements ProductTagRepositoryInterface
{

    public function getModel()
    {
        return ProductTag::class;

    }
}
