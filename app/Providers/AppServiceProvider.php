<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Category;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\View;
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
        View::share([
            'categories'=> $categories,
            'social'    => $social,
            'articles'  => $articles,
            'popular'   => $popular,
        ]);

    }
}
