<?php


namespace App\Services;


interface ProductServiceInterface
{
    public function getAllProducts();

    public function getProductsByCategory($categoryID);

    public function getProduct($id);
}
