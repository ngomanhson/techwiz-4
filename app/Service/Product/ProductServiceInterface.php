<?php

namespace App\Service\Product;

use App\Service\ServiceInterface;

interface ProductServiceInterface extends ServiceInterface
{
    public function getProductOnIndex($request);
    public function getProductByCategory($categoryName,$request);
}
