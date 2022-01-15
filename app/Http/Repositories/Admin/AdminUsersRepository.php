<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminUsersInterface;
use App\Models\JobTitle;
use App\Models\User;
use App\Traits\ImagesTrait;
use App\Traits\PermissionsTrait;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminUsersRepository implements AdminUsersInterface
{
    use ImagesTrait,PermissionsTrait;

    public function index()
    {
        $this->permission(['admin']);
        $users = User::get();
        return view('Admin.Users.index',compact('users'));
    }

    public function create()
    {
        $this->permission(['admin']);
        $jobTitles = JobTitle::get();
        return view('Admin.Users.create',compact('jobTitles'));
    }

    public function store($request)
    {
        $this->permission(['admin']);
        $imageName = time() . '_user.'.$request->image->extension();
        $this->uploadImage($request->image,$imageName,'Users');
        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => Hash::make($request->password),
            'image'         => $imageName,
            'job_title_id'  => $request->job_title_id,
        ]);
        Alert::success('Success','User Created Successfully');
        return redirect(route('admin.users.all'));
    }

    public function edit($userId)
    {
        $this->permission(['admin']);
        $user = User::find($userId);
        $jobTitles = JobTitle::get();
        return view('Admin.Users.edit',compact('user','jobTitles'));
    }

    public function update($request)
    {
        $this->permission(['admin']);
        $user = User::find($request->id);
        if (!is_null($request->image))
        {
            $imageName = time() . '_user.'.$request->image->extension();
            $this->uploadImage($request->image,$imageName,'Users',$user->image);
        }
        $user->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'job_title_id' => $request->job_title_id,
            'password'     => isset($request->password)?(Hash::make($request->password)):$user->password,
            'image'        => (isset($imageName))?$imageName:$user->getRawOriginal('image')
        ]);
        Alert::success('Success','User Updated Successfully');
        return redirect(route('admin.users.all'));
    }

    public function activate($userId)
    {
        $this->permission(['admin']);
        $user = User::find($userId);
        $user->update([
            'active'    =>1
        ]);
        Alert::success('Success','User Activated Successfully');
        return redirect()->back();
    }

    public function deactivate($userId)
    {
        $this->permission(['admin']);
        $user = User::find($userId);
        $user->update([
            'active'    =>0
        ]);
        Alert::success('Success','User deActivated Successfully');
        return redirect()->back();
    }

    public function show($userId)
    {
        $this->permission(['admin']);
        $user = User::find($userId);
        return view('Admin.Users.show',compact('user'));
    }

    public function delete($request)
    {
        $this->permission(['admin']);
        $user = User::find($request->id);
        unlink(public_path($user->image));
        $user->delete();
        Alert::success('success','User Deleted Successfully');
        return redirect()->back();
    }
}
