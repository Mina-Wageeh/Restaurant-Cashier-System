<?php

namespace App\Services\Implementations;

use App\Repositories\CategoryRepositoryInterface;
use App\Services\CategoryServiceInterface;


class CategoryService implements CategoryServiceInterface
{
    public $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategories()
    {
        return $this->categoryRepository->getCategories();
    }

}
