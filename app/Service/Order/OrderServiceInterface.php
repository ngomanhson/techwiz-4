<?php

namespace App\Service\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\BaseService;
use App\Service\ServiceInterface;

interface OrderServiceInterface extends ServiceInterface
{
    public function getOrderByUserId($user_id);
    public function confirmOrderPayment($orderId);
}
