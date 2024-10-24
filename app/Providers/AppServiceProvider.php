<?php

namespace App\Providers;

use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\Implementations\CategoryRepository;
use App\Repositories\Implementations\ProductRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Services\CategoryServiceInterface;
use App\Services\Implementations\CategoryService;
use App\Services\Implementations\ProductService;
use App\Services\ProductServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //Repositories
        $this->app->bind(CategoryRepositoryInterface::class , CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class , ProductRepository::class);

        //Services
        $this->app->bind(CategoryServiceInterface::class , CategoryService::class);
        $this->app->bind(ProductServiceInterface::class , ProductService::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
