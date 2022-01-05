<?php

namespace App\Providers;

use App\Http\Interfaces\Admin\AdminArticleInterface;
use App\Http\Interfaces\Admin\AdminCategoryInterface;
use App\Http\Repositories\Admin\AdminArticleRepository;
use App\Http\Repositories\Admin\AdminCategoryRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(AdminCategoryInterface::class,AdminCategoryRepository::class);
        $this->app->bind(AdminArticleInterface::class,AdminArticleRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
