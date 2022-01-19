<?php

namespace App\Http\Repositories\EndUser;

use App\Events\ArticleViews;
use App\Http\Interfaces\EndUser\HomeInterface;
use App\Models\Article;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Support\Collection;
use RealRashid\SweetAlert\Facades\Alert;
use Share;

class HomeRepository implements HomeInterface
{
    public function index()
    {
        $cat1 = Category::find(2)->articles()->orderBy('id','desc')->get();
        $cat2 = Category::find(4)->articles()->orderBy('id','desc')->get();
        $cat3 = Category::find(5)->articles()->orderBy('id','desc')->get();
        return view('EndUser.index',compact('cat1','cat2','cat3'));
    }

    public function categoryPage($categoryName)
    {
        $cat = Category::where('name',$categoryName)->first();
        $categoryArticles = $cat->articles()->orderBy('id','desc')->paginate(10);
        return view('EndUser.categories',compact('categoryArticles'));
    }

    public function showArticle($categoryName,$articleId)
    {
        $article = Article::find($articleId);
        $user = User::find($article->created_by);
        $articleTags = $article->tags;
        $relatedPosts = new Collection();
        foreach ($articleTags as $tag){
            $relatedPosts = $relatedPosts->merge($tag->articles);
        }
        event(new ArticleViews($article));
        return view('EndUser.Articles.show',compact('article','user','relatedPosts'));
    }

    public function contactPage()
    {
        return view('EndUser.contact');
    }

    public function storeContact($request)
    {
        Contact::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'message'   => $request->message
        ]);
        Alert::success('Success','Your Message Has Been Sent!');
        return redirect()->back();
    }
}
