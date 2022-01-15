<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminArticleInterface;
use App\Http\Requests\Articles\AddArticleRequest;
use App\Http\Requests\Articles\DeleteArticleRequest;
use App\Http\Requests\Articles\UpdateArticleRequest;
use Illuminate\Http\Request;

class AdminArticleController extends Controller
{
    public $adminArticleInterface;

    public function __construct(AdminArticleInterface $adminArticleInterface)
    {
        $this->adminArticleInterface = $adminArticleInterface;
    }

    public function index()
    {
        return $this->adminArticleInterface->index();
    }

    public function create()
    {
        return $this->adminArticleInterface->create();
    }

    public function store(AddArticleRequest $request)
    {
        return $this->adminArticleInterface->store($request);
    }

    public function edit($articleId)
    {
        return $this->adminArticleInterface->edit($articleId);
    }

    public function show($articleId)
    {
        return $this->adminArticleInterface->show($articleId);
    }

    public function update(UpdateArticleRequest $request)
    {
        return $this->adminArticleInterface->update($request);
    }

    public function delete(DeleteArticleRequest $request)
    {
        return $this->adminArticleInterface->delete($request);
    }
}
