<?php

namespace App\Http\Controllers;

use App\Services\CategoryServiceInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $categoryService;
    public $productService;

    public function __construct(CategoryServiceInterface $categoryService , ProductServiceInterface $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function getAllProducts()
    {
        $allProducts = $this->productService->getAllProducts();
        return response()->json($allProducts);
    }

    public function getProduct(Request $request)
    {
        $product_id = $request->product_id;
        $product = $this->productService->getProduct($product_id);
        return response()->json($product);
    }


    public function getProductsByCategory(Request $request , $categoryID)
    {
        $productsByCategory = $this->productService->getProductsByCategory($categoryID);
        return response()->json($productsByCategory);
    }

}
