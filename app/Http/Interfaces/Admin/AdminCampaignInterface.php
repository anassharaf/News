<?php

namespace App\Http\Interfaces\Admin;

interface AdminCampaignInterface
{
    public function index();

    public function create();

    public function store($request);

    public function edit($campaignId);

    public function show($campaignId);

    public function changeStatus($campaignId);

    public function update($request);

    public function delete($request);
}
