<?php

namespace App\Repositories\OrderDetail;

use App\Repositories\BaseRepositories;

class OrderDetailRepository extends BaseRepositories implements OrderDetailRepositoryInterface
{

    public function getModel()
    {
     return OrderDetail::class;
        // TODO: Implement getModel() method.
    }
}
