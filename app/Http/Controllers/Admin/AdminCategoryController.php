<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCategoryInterface;
use App\Http\Requests\Categories\AddCategoryRequest;
use App\Http\Requests\Categories\DeleteCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public $adminCategoryInterface;
    public function __construct(AdminCategoryInterface $adminCategoryInterface)
    {
        $this->adminCategoryInterface = $adminCategoryInterface;
    }

    public function index()
    {
        return $this->adminCategoryInterface->index();
    }

    public function create()
    {
        return $this->adminCategoryInterface->create();
    }

    public function store(AddCategoryRequest $request)
    {
        return $this->adminCategoryInterface->store($request);
    }

    public function edit($categoryId)
    {
        return $this->adminCategoryInterface->edit($categoryId);
    }

    public function show($categoryId)
    {
        return $this->adminCategoryInterface->show($categoryId);
    }

    public function update(UpdateCategoryRequest $request)
    {
        return $this->adminCategoryInterface->update($request);
    }

    public function delete(DeleteCategoryRequest $request)
    {
        return $this->adminCategoryInterface->delete($request);
    }
}
