<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCampaignBannerInterface;
use App\Http\Requests\CampaignBanners\AddCampaignBannerRequest;
use App\Http\Requests\CampaignBanners\DeleteCampaignBannerRequest;
use App\Http\Requests\CampaignBanners\UpdateCampaignBannerRequest;
use Illuminate\Http\Request;

class AdminCampaignBannerController extends Controller
{
    public $adminCampaignBannerInterface;

    public function __construct(AdminCampaignBannerInterface $adminCampaignBannerInterface)
    {
        $this->adminCampaignBannerInterface = $adminCampaignBannerInterface;
    }


    public function create($campaignId)
    {
        return $this->adminCampaignBannerInterface->create($campaignId);
    }

    public function store(AddCampaignBannerRequest $request)
    {
        return $this->adminCampaignBannerInterface->store($request);
    }

    public function delete(DeleteCampaignBannerRequest $request)
    {
        return $this->adminCampaignBannerInterface->delete($request);
    }
}
