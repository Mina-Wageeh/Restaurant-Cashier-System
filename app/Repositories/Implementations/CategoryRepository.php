<?php

namespace App\Repositories\Implementations;

use App\Models\Category;
use App\Repositories\CategoryRepositoryInterface;


class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories()
    {
        return Category::get();
    }
}
