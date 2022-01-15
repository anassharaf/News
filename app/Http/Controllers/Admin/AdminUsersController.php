<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminUsersInterface;
use App\Http\Requests\Users\AddUserRequest;
use App\Http\Requests\Users\DeleteUserRequest;
use App\Http\Requests\Users\UpdateUserRequest;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public $adminUsersInterface;

    public function __construct(AdminUsersInterface $adminUsersInterface)
    {
        $this->adminUsersInterface = $adminUsersInterface;
    }

    public function index()
    {
        return $this->adminUsersInterface->index();
    }

    public function create()
    {
        return $this->adminUsersInterface->create();
    }

    public function store(AddUserRequest $request)
    {
        return $this->adminUsersInterface->store($request);
    }

    public function edit($userId)
    {
        return $this->adminUsersInterface->edit($userId);
    }

    public function activate($userId)
    {
        return $this->adminUsersInterface->activate($userId);
    }

    public function deactivate($userId)
    {
        return $this->adminUsersInterface->deactivate($userId);
    }

    public function update(UpdateUserRequest $request)
    {
        return $this->adminUsersInterface->update($request);
    }

    public function show($userId)
    {
        return $this->adminUsersInterface->show($userId);
    }

    public function delete(DeleteUserRequest $request)
    {
        return $this->adminUsersInterface->delete($request);
    }
}
