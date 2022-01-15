<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminSocialMediaInterface;
use App\Models\SocialMedia;
use App\Traits\ImagesTrait;
use App\Traits\PermissionsTrait;
use RealRashid\SweetAlert\Facades\Alert;

class AdminSocialMediaRepository implements AdminSocialMediaInterface
{
    use ImagesTrait,PermissionsTrait;

    public function index()
    {
        $socials = SocialMedia::get();
        return view('Admin.Social.index',compact('socials'));
    }

    public function create()
    {
        return view('Admin.Social.create');
    }

    public function store($request)
    {
        $iconName = time() . '_social.'.$request->icon->extension();
        $this->uploadImage($request->icon,$iconName,'Social');
        SocialMedia::create([
            'social_network'=> $request->social_network,
            'link'          => $request->link,
            'icon'          => $iconName
        ]);
        Alert::success('Success','Social Created Successfully');
        return redirect(route('admin.social.all'));
    }

    public function edit($socialId)
    {
        $social = SocialMedia::find($socialId);
        return view('Admin.Social.edit',compact('social'));
    }

    public function update($request)
    {
        $social = SocialMedia::find($request->id);
        if (!is_null($request->icon))
        {
            $iconName = time() . '_social.'.$request->icon->extension();
            $this->uploadImage($request->icon,$iconName,'Social',$social->icon);
        }
        $social->update([
            'social_network'=> $request->social_network,
            'link'          => $request->link,
            'icon'          => (isset($iconName))?$iconName:$social->getRawOriginal('icon')
        ]);
        Alert::success('Success','Social Updated Successfully');
        return redirect(route('admin.social.all'));
    }

    public function delete($request)
    {
        $social = SocialMedia::find($request->id);
        unlink(public_path($social->icon));
        $social->delete();
        Alert::success('success','Social Deleted Successfully');
        return redirect()->back();
    }
}
