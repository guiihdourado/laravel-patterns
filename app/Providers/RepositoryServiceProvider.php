<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\UserRepository;
use App\Contracts\UserRepositoryInterface;

use App\Repositories\ProductRepository;
use App\Contracts\ProductRepositoryInterface;

use App\Repositories\SaleOrderRepository;
use App\Contracts\SaleOrderRepositoryInterface;

use App\Repositories\SaleOrderProductRepository;
use App\Contracts\SaleOrderProductRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(SaleOrderRepositoryInterface::class, SaleOrderRepository::class);
        $this->app->bind(SaleOrderProductRepositoryInterface::class, SaleOrderProductRepository::class);
    }
}
