<?php

namespace App\Http\Interfaces\Admin;

interface AdminUsersInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($userId);

    public function activate($userId);

    public function deactivate($userId);

    public function update($request);

    public function show($userId);

    public function delete($request);
}
