<?php


namespace App\Repositories;


interface ProductRepositoryInterface
{
    public function getAllProducts();

    public function getProductsByCategory($categoryID);

    public function getProduct($id);
}
