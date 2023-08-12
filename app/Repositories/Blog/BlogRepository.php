<?php

namespace App\Repositories\Blog;

use App\Models\Blog;
use App\Repositories\BaseRepositories;

class BlogRepository extends BaseRepositories implements BlogRepositoryInterface
{

    public function getModel()
    {
        return Blog::class;
        // TODO: Implement getModel() method.
    }
}
