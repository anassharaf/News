<?php

namespace App\Providers;

use App\Http\Interfaces\Admin\AdminArticleInterface;
use App\Http\Interfaces\Admin\AdminAuthInterface;
use App\Http\Interfaces\Admin\AdminBannerInterface;
use App\Http\Interfaces\Admin\AdminCampaignBannerInterface;
use App\Http\Interfaces\Admin\AdminCampaignInterface;
use App\Http\Interfaces\Admin\AdminCategoryInterface;
use App\Http\Interfaces\Admin\AdminContactInterface;
use App\Http\Interfaces\Admin\AdminSocialMediaInterface;
use App\Http\Interfaces\Admin\AdminUsersInterface;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Http\Repositories\Admin\AdminArticleRepository;
use App\Http\Repositories\Admin\AdminAuthRepository;
use App\Http\Repositories\Admin\AdminBannerRepository;
use App\Http\Repositories\Admin\AdminCampaignBannerRepository;
use App\Http\Repositories\Admin\AdminCampaignRepository;
use App\Http\Repositories\Admin\AdminCategoryRepository;
use App\Http\Repositories\Admin\AdminContactRepository;
use App\Http\Repositories\Admin\AdminSocialMediaRepository;
use App\Http\Repositories\Admin\AdminUsersRepository;
use App\Http\Repositories\EndUser\HomeRepository;
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
        $this->app->bind(AdminAuthInterface::class,AdminAuthRepository::class);
        $this->app->bind(AdminUsersInterface::class,AdminUsersRepository::class);
        $this->app->bind(AdminSocialMediaInterface::class,AdminSocialMediaRepository::class);
        $this->app->bind(AdminBannerInterface::class,AdminBannerRepository::class);
        $this->app->bind(AdminCampaignInterface::class,AdminCampaignRepository::class);
        $this->app->bind(AdminContactInterface::class,AdminContactRepository::class);
        $this->app->bind(AdminCampaignBannerInterface::class,AdminCampaignBannerRepository::class);
        $this->app->bind(HomeInterface::class,HomeRepository::class);
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
