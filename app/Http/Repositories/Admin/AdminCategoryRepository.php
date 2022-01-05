<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCategoryInterface;
use App\Models\Category;
use App\Traits\ImagesTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoryRepository implements AdminCategoryInterface
{
    use ImagesTrait;

    public function index()
    {
        $categories = Category::get();
        return view('Admin.Categories.index',compact('categories'));
    }

    public function create()
    {
        return view('Admin.Categories.create');
    }

    public function store($request)
    {
        $imageName = time() . '_category.'.$request->image->extension();
        $this->uploadImage($request->image,$imageName,'Categories');
        Category::create([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => $imageName
        ]);
        Alert::success('Success','Category Created Successfully');
        return redirect(route('admin.categories.all'));
    }

    public function edit($categoryId)
    {
        $category = Category::find($categoryId);
        return view('Admin.Categories.edit',compact('category'));
    }

    public function update($request)
    {
        $category = Category::find($request->id);
        if (!is_null($request->image))
        {
            $imageName = time() . '_category.'.$request->image->extension();
            $this->uploadImage($request->image,$imageName,'Categories',$category->image);
        }
        $category->update([
            'name'          => $request->name,
            'description'   => $request->description,
            'image'         => (isset($imageName))?$imageName:$category->getRawOriginal('image')
        ]);
        Alert::success('Success','Category Updated Successfully');
        return redirect(route('admin.categories.all'));
    }

    public function show($categoryId)
    {
        $category = Category::find($categoryId);
        return view('Admin.Categories.show',compact('category'));
    }

    public function delete($request)
    {
        $category = Category::find($request->id);
        unlink(public_path($category->image));
        $category->delete();
        Alert::success('success','Category Deleted Successfully');
        return redirect()->back();
    }
}
