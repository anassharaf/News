<?php

namespace App\Http\Repositories\EndUser;

use App\Events\ArticleViews;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Models\Article;
use App\Models\Category;
use App\Models\User;

class HomeRepository implements HomeInterface
{
    public function index()
    {
        $cat1 = Category::find(2)->articles()->orderBy('id','desc')->get();
        $cat2 = Category::find(4)->articles()->orderBy('id','desc')->get();
        $cat3 = Category::find(5)->articles()->orderBy('id','desc')->get();
        return view('EndUser.index',compact('cat1','cat2','cat3'));
    }

    public function showArticle($categoryName,$articleId)
    {
        $article = Article::find($articleId);
        $user = User::find($article->created_by);
        event(new ArticleViews($article));
        return view('EndUser.Articles.show',compact('article','user'));
    }

}
