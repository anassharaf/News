<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\SocialMedia;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Jorenvh\Share\Share;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        $articles = Article::latest()->take(10)->get();
        $categories = Category::get();
        $popular = Article::orderBy('views','desc')->take(5)->get();
        $social = SocialMedia::get();
        $campaigns = Campaign::where('active',1)->get();
        $sideBanners = new Collection();
        $headerBanners = new Collection();
        foreach ($campaigns as $campaign){

            $startDate = date('Y-m-d', strtotime($campaign->start_date));
            $endDate = date('Y-m-d', strtotime($campaign->end_date));
            if (now()->between($startDate, $endDate)) {
                $sideBanners = $sideBanners->merge($campaign->getCampaignBannersByBannerId(3));
                $headerBanners = $headerBanners->merge($campaign->getCampaignBannersByBannerId(2));
            }
        }
        View::share([
            'categories'=> $categories,
            'social'    => $social,
            'articles'  => $articles,
            'popular'   => $popular,
            'sideBanners'=>$sideBanners,
            'headerBanners'=>$headerBanners,

        ]);

    }
}
