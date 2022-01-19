<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminArticleInterface;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Traits\ImagesTrait;
use App\Traits\PermissionsTrait;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminArticleRepository implements AdminArticleInterface
{
    use ImagesTrait,PermissionsTrait;

    public function index()
    {
        $articles = Article::orderBy('id','desc')->paginate(10);
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
        $article = Article::create([
            'title'         => $request->title,
            'body'          => $request->body,
            'image'         => $imageName,
            'category_id'   => $request->category_id,
            'created_by'    => Auth::id(),
            'updated_by'    => Auth::id()
        ]);
        if ($this->tag($request->tags,$article))
        Alert::success('Success','Article Created Successfully');
        return redirect(route('admin.articles.all'));
    }

    public function edit($articleId)
    {
        $this->permission(['admin','supervisor']);
        $article = Article::find($articleId);
        $tags = $article->tags->toArray();
        $categories = Category::get();
        return view('Admin.Articles.edit',compact('article','categories','tags'));
    }

    public function update($request)
    {
        $this->permission(['admin','supervisor']);
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
            'updated_by'    => Auth::id(),
            'image'         => (isset($imageName))?$imageName:$article->getRawOriginal('image')
        ]);
        $article->tags()->sync([]); //delete all previous tags in the article
        $tags = $request->tags;
        $this->tag($tags,$article);
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
        $this->permission(['admin','supervisor']);
        $article = Article::find($request->id);
        unlink(public_path($article->image));
        $article->delete();
        Alert::success('success','Category Deleted Successfully');
        return redirect()->back();
    }

    private function tag($tags,$article)
    {
        $tags = explode(',',$tags);
        foreach ($tags as $tag){
            $tag1 = Tag::where('name',$tag)->first();

            if (is_null($tag1))
            {
                $tag1 =Tag::create([
                    'name'  => $tag
                ]);
            }
            $tag1->articles()->attach($article);
            $tag1 = null;

        }
        return true;




    }
}
