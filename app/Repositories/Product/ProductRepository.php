<?php

namespace App\Repositories\Product;

use App\Models\Product;
use App\Repositories\BaseRepositories;

class ProductRepository extends BaseRepositories implements ProductRepositoryInterface
{

    public function getModel()
    {
        // TODO: Implement getModel() method.
        return Product::class;
    }
    public function getRelatedProducts($product, $limit =4)
    {
        return $this->model->where('product_category_id',$product->product_category_id)
            ->limit($limit)
            ->get();
    }
}
