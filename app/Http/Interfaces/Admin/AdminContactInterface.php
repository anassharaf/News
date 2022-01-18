<?php

namespace App\Http\Interfaces\Admin;

interface AdminContactInterface
{
    public function index();

    public function show($contactId);

    public function update($request);

    public function delete($request);

//    public function email($contact);
}
