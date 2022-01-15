<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminSocialMediaInterface;
use App\Http\Requests\Social\AddSocialRequest;
use App\Http\Requests\Social\DeleteSocialRequest;
use App\Http\Requests\Social\UpdateSocialRequest;
use Illuminate\Http\Request;

class AdminSocialMediaController extends Controller
{
    public $adminSocialMediaInterface;

    public function __construct(AdminSocialMediaInterface $adminSocialMediaInterface)
    {
        $this->adminSocialMediaInterface = $adminSocialMediaInterface;
    }

    public function index()
    {
        return $this->adminSocialMediaInterface->index();
    }

    public function create()
    {
        return $this->adminSocialMediaInterface->create();
    }

    public function store(AddSocialRequest $request)
    {
        return $this->adminSocialMediaInterface->store($request);
    }

    public function edit($socialId)
    {
        return $this->adminSocialMediaInterface->edit($socialId);
    }

    public function update(UpdateSocialRequest $request)
    {
        return $this->adminSocialMediaInterface->update($request);
    }

    public function delete(DeleteSocialRequest $request)
    {
        return $this->adminSocialMediaInterface->delete($request);
    }
}
