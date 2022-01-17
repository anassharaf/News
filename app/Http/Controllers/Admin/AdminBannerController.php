<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminBannerInterface;
use App\Http\Requests\Banners\AddBannerRequest;
use App\Http\Requests\Banners\DeleteBannerRequest;
use App\Http\Requests\Banners\UpdateBannerRequest;
use Illuminate\Http\Request;

class AdminBannerController extends Controller
{
    public $adminBannerInterface;

    public function __construct(AdminBannerInterface $adminBannerInterface)
    {
        $this->adminBannerInterface = $adminBannerInterface;
    }

    public function index()
    {
        return $this->adminBannerInterface->index();
    }

    public function create()
    {
        return $this->adminBannerInterface->create();
    }

    public function store(AddBannerRequest $request)
    {
        return $this->adminBannerInterface->store($request);
    }

    public function edit($bannerId)
    {
        return $this->adminBannerInterface->edit($bannerId);
    }

    public function update(UpdateBannerRequest $request)
    {
        return $this->adminBannerInterface->update($request);
    }

    public function delete(DeleteBannerRequest $request)
    {
        return $this->adminBannerInterface->delete($request);
    }
}
