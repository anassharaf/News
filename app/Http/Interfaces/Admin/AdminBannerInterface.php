<?php

namespace App\Http\Interfaces\Admin;

interface AdminBannerInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($bannerId);

    public function update($request);

    public function delete($request);
}
