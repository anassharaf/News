<?php

namespace App\Http\Interfaces\Admin;

interface AdminAuthInterface
{
    public function loginPage();

    public function login($request);

    public function logout();
}
