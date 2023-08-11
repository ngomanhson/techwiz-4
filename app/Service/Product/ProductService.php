<?php

namespace App\Service\Product;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Service\BaseService;

class ProductService extends BaseService implements ProductServiceInterface
{
    public $repository;
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function getProductOnIndex($request)
    {
        return $this->repository->getProductOnIndex($request);

    }
    public function find($id)
    {
        if (is_numeric($id)) {
            // Tìm kiếm bằng id nếu giá trị truyền vào là số nguyên
            $product = $this->repository->find($id);
        } else {
            // Tìm kiếm bằng slug nếu giá trị truyền vào không phải số nguyên
            $product = $this->repository->findBySlug($id);
        }

        $productReviews = $product->reviews()->get(); // Get the reviews collection
        $averageRating = $product->reviews()->avg('score'); // Trung bình điểm đánh giá
        $reviewCount = $product->reviews()->count(); // Số lượng đánh giá

        $product->setAttribute('averageRating', $averageRating);
        $product->setAttribute('reviewCount', $reviewCount);
        $product->setAttribute('productReviews', $productReviews);

        return $product;
    }

    public function getRelatedProducts($product, $limit =4)
    {
        return $this->repository->getRelatedProducts($product,$limit);

    }
    public function getProductByCategory($categoryName,$request)
    {
        return $this->repository->getProductByCategory($categoryName,$request);
    }

}
