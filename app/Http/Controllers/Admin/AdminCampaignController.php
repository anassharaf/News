<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Admin\AdminCampaignInterface;
use App\Http\Requests\Campaigns\AddCampaignRequest;
use App\Http\Requests\Campaigns\DeleteCampaignRequest;
use App\Http\Requests\Campaigns\UpdateCampaignRequest;
use Illuminate\Http\Request;

class AdminCampaignController extends Controller
{
    public $adminCampaignInterface;

    public function __construct(AdminCampaignInterface $adminCampaignInterface)
    {
        $this->adminCampaignInterface = $adminCampaignInterface;
    }

    public function index()
    {
        return $this->adminCampaignInterface->index();
    }

    public function create()
    {
        return $this->adminCampaignInterface->create();
    }

    public function store(AddCampaignRequest $request)
    {
        return $this->adminCampaignInterface->store($request);
    }

    public function edit($campaignId)
    {
        return $this->adminCampaignInterface->edit($campaignId);
    }

    public function show($campaignId)
    {
        return $this->adminCampaignInterface->show($campaignId);
    }

    public function changeStatus($campaignId)
    {
        return $this->adminCampaignInterface->changeStatus($campaignId);
    }

    public function update(UpdateCampaignRequest $request)
    {
        return $this->adminCampaignInterface->update($request);
    }

    public function delete(DeleteCampaignRequest $request)
    {
        return $this->adminCampaignInterface->delete($request);
    }
}
