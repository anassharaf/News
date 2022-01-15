<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCategoryInterface;
use App\Models\Category;
use App\Models\User;
use App\Traits\ImagesTrait;
use App\Traits\PermissionsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCategoryRepository implements AdminCategoryInterface
{
    use ImagesTrait,PermissionsTrait;

    public function index()
    {
        $this->permission(['admin']);
        $categories = Category::get();
        return view('Admin.Categories.index',compact('categories'));
    }

    public function create()
    {
        $this->permission(['admin']);
        return view('Admin.Categories.create');
    }

    public function store($request)
    {
        $this->permission(['admin']);
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
        $this->permission(['admin']);
        $category = Category::find($categoryId);
        return view('Admin.Categories.edit',compact('category'));
    }

    public function update($request)
    {
        $this->permission(['admin']);
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
        $this->permission(['admin']);
        $category = Category::find($categoryId);
        return view('Admin.Categories.show',compact('category'));
    }

    public function delete($request)
    {
        $this->permission(['admin']);
        $category = Category::find($request->id);
        unlink(public_path($category->image));
        $category->delete();
        Alert::success('success','Category Deleted Successfully');
        return redirect()->back();
    }
}
