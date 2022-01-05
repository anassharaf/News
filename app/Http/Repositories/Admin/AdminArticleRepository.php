<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminArticleInterface;
use App\Models\Article;
use App\Models\Category;
use App\Traits\ImagesTrait;
use RealRashid\SweetAlert\Facades\Alert;

class AdminArticleRepository implements AdminArticleInterface
{
    use ImagesTrait;

    public function index()
    {
        $articles = Article::get();
        return view('Admin.Articles.index',compact('articles'));
    }

    public function create()
    {
        $categories = Category::get();
        return view('Admin.Articles.create',compact('categories'));
    }

    public function store($request)
    {
        $imageName = time() . '_article.'.$request->image->extension();
        $this->uploadImage($request->image,$imageName,'Articles');
        Article::create([
            'title'         => $request->title,
            'body'          => $request->body,
            'image'         => $imageName,
            'category_id'   => $request->category_id
        ]);
        Alert::success('Success','Article Created Successfully');
        return redirect(route('admin.articles.all'));
    }

    public function edit($articleId)
    {
        $article = Article::find($articleId);
        $categories = Category::get();
        return view('Admin.Articles.edit',compact('article','categories'));
    }

    public function update($request)
    {
        $article = Article::find($request->id);
        if (!is_null($request->image))
        {
            $imageName = time() . '_article.'.$request->image->extension();
            $this->uploadImage($request->image,$imageName,'Articles',$article->image);
        }
        $article->update([
            'title'         => $request->title,
            'body'          => $request->body,
            'category_id'   => $request->category_id,
            'image'         => (isset($imageName))?$imageName:$article->getRawOriginal('image')
        ]);
        Alert::success('Success','Category Updated Successfully');
        return redirect(route('admin.articles.all'));
    }

    public function show($articleId)
    {
        $article = Article::find($articleId);
        return view('Admin.Articles.show',compact('article'));
    }

    public function delete($request)
    {
        $article = Article::find($request->id);
        unlink(public_path($article->image));
        $article->delete();
        Alert::success('success','Category Deleted Successfully');
        return redirect()->back();
    }
}
