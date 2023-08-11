<?php

namespace App\Repositories\ProductCategory;

use App\Models\ProductCategory;
use App\Repositories\BaseRepositories;
use App\Repositories\RepositoriesInterface;

class ProductCategoryRepository extends BaseRepositories implements ProductCategoryRepositoryInterface
{

    public function getModel()
    {
        return ProductCategory::class;
        // TODO: Implement getModel() method.
    }

    public function getAll()
    {
        return $this->model->all();
    }

}
