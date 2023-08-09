<?php

namespace App\Repositories\Order;

use App\Repositories\BaseRepositories;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
        // TODO: Implement getModel() method.

    }
}
