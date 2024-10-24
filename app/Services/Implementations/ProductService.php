<?php


namespace App\Services\Implementations;

use App\Repositories\ProductRepositoryInterface;
use App\Services\ProductServiceInterface;

class ProductService implements ProductServiceInterface
{

    public $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductsByCategory($categoryID)
    {
        return $this->productRepository->getProductsByCategory($categoryID);
    }

    public function getProduct($id)
    {
        return $this->productRepository->getProduct($id);
    }

}
