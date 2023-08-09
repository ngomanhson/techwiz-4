<?php

namespace App\Service\Order;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Service\BaseService;
use App\Service\ServiceInterface;

class OrderService extends BaseService implements OrderServiceInterface
{
    public $repository;
    public function __construct(OrderRepositoryInterface  $OrderRepository){
        $this->repository =$OrderRepository;
    }
}
