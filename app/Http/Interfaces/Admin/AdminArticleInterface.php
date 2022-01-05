<?php

namespace App\Http\Interfaces\Admin;

interface AdminArticleInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($articleId);

    public function show($articleId);

    public function update($request);

    public function delete($request);
}
