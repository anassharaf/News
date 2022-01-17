<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Campaign;
use App\Models\Category;
use App\Models\SocialMedia;
use Illuminate\Database\Eloquent\Collection;
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
        $articles = Article::latest()->take(10)->get();
        $categories = Category::get();
        $popular = Article::orderBy('views','desc')->take(5)->get();
        $social = SocialMedia::get();
        $campaigns = Campaign::where('active',1)->get();
//        $campaignsBanners = new Collection();
        $sideBanners = new Collection();
        $headerBanners = new Collection();
        foreach ($campaigns as $campaign){
//            $campaignsBanners = $campaignsBanners->merge($campaign->campaignBanners);
            $sideBanners = $sideBanners->merge($campaign->getCampaignBannersByBannerId(3));
            $headerBanners = $headerBanners->merge($campaign->getCampaignBannersByBannerId(2));
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
