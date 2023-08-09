<?php

namespace App\Service\ProductTag;

use App\Repositories\ProductTag\ProductTagRepositoryInterface;
use App\Service\BaseService;

class ProductTagService extends BaseService implements ProductTagServiceInterface
{
    public $repository;
    public function __construct(ProductTagRepositoryInterface $productTagRepository)
    {
        $this->repository=$productTagRepository;
    }

}
