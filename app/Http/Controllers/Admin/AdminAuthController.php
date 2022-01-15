<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminAuthInterface;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{

    public $adminAuthInterface;

    public function __construct(AdminAuthInterface $adminAuthInterface)
    {
        $this->adminAuthInterface = $adminAuthInterface;
    }

    public function loginPage()
    {
        return $this->adminAuthInterface->loginPage();
    }

    public function login(Request $request)
    {
        return $this->adminAuthInterface->login($request);
    }

    public function logout()
    {
        return $this->adminAuthInterface->logout();
    }
}
