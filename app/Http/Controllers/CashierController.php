<?php

namespace App\Http\Controllers;


use App\Services\CategoryServiceInterface;
use App\Services\ProductServiceInterface;

class CashierController extends Controller
{
    public $categoryService;
    public $productService;

    public function __construct(CategoryServiceInterface $categoryService , ProductServiceInterface $productService)
    {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index()
    {
        $allCategories = $this->categoryService->getCategories();
        $allProducts = $this->productService->getAllProducts();
        return view('cashier.index' , compact('allProducts' , 'allCategories'));
    }
}
