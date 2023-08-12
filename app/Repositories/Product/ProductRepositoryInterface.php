<?php

namespace App\Repositories\Product;

use App\Repositories\RepositoriesInterface;

interface ProductRepositoryInterface extends RepositoriesInterface
{
    public function getProductOnIndex($request);
    public function getProductByCategory($categoryName,$request);
    public function findBySlug($slug);
}
