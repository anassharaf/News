<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminBannerInterface;
use App\Models\Banner;
use App\Traits\PermissionsTrait;
use RealRashid\SweetAlert\Facades\Alert;

class AdminBannerRepository implements AdminBannerInterface
{
    use PermissionsTrait;

    public function index()
    {
        $banners = Banner::get();
        return view('Admin.Banners.index',compact('banners'));
    }

    public function create()
    {
        return view('Admin.Banners.create');
    }

    public function store($request)
    {
        Banner::create([
            'position'  => $request->position,
            'width'     => $request->width,
            'height'    => $request->height
        ]);
        Alert::success('Success','Banner Added Successfully');
        return redirect(route('admin.banners.all'));
    }

    public function edit($bannerId)
    {
        $banner = Banner::find($bannerId);
        return view('Admin.Banners.edit',compact('banner'));
    }

    public function update($request)
    {
        $banner = Banner::find($request->id);

        $banner->update([
            'position'  => $request->position,
            'height'    => $request->height,
            'width'     => $request->width,
        ]);
        Alert::success('Success','Banner Updated Successfully');
        return redirect(route('admin.banners.all'));
    }

    public function delete($request)
    {
        Banner::find($request->id)->delete();
        Alert::success('success','Banner Deleted Successfully');
        return redirect()->back();
    }
}
