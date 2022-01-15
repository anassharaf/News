<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminAuthInterface;
use Illuminate\Support\Facades\Auth;

class AdminAuthRepository implements AdminAuthInterface
{
    public function loginPage()
    {
        return view('Admin.login');
    }

    public function login($request)
    {

        auth()->attempt(['email' => $request->email,'password'=>$request->password]);
        if (auth()->attempt(['email' => $request->email,'password'=>$request->password])){
            return redirect(route('admin.'));
        }else{
            return abort(403);
        }
    }

    public function logout()
    {
        \auth()->logout();
        return redirect(route('admin.login'));
    }
}
