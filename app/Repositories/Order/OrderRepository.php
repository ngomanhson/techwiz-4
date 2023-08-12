<?php

namespace App\Repositories\Order;

use App\Models\Order;
use App\Repositories\BaseRepositories;
use App\Repositories\Order\OrderRepositoryInterface;

class OrderRepository extends BaseRepositories implements OrderRepositoryInterface
{

    public function getModel()
    {
        return Order::class;
        // TODO: Implement getModel() method.

    }

    public function getOrderByUserId($userId)
    {
        // TODO: Implement getOrderByUserId() method.
        return $this->model->where('user_id', $userId)->orderBy("id", "desc")->get();
    }
}
