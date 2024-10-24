<?php

namespace App\Repositories\Implementations;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;


class ProductRepository implements ProductRepositoryInterface
{

    public function getAllProducts()
    {
        return Product::get();
    }

    public function getProductsByCategory($categoryID)
    {
        return Product::where('category_id' , $categoryID)->get();
    }

    public function getProduct($id)
    {
        return Product::find($id);
    }

}
