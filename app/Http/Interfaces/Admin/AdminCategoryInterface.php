<?php

namespace App\Http\Interfaces\Admin;

interface AdminCategoryInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($categoryId);

    public function show($categoryId);

    public function update($request);

    public function delete($request);
}
