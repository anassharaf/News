<?php

namespace App\Http\Interfaces\Admin;

interface AdminCampaignBannerInterface
{

    public function create($campaignId);

    public function store($request);

    public function delete($request);
}
