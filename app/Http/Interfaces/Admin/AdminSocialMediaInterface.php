<?php

namespace App\Http\Interfaces\Admin;

interface AdminSocialMediaInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($socialId);

    public function update($request);

    public function delete($request);
}
