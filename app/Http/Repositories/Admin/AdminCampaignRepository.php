<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCampaignInterface;
use App\Models\Banner;
use App\Models\Campaign;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCampaignRepository implements AdminCampaignInterface
{

    public function index()
    {
        $campaigns = Campaign::get();
        return view('Admin.Campaigns.index',compact('campaigns'));
    }

    public function create()
    {
        return view('Admin.Campaigns.create');
    }

    public function store($request)
    {
        Campaign::create([
            'name'  => $request->name,
            'start_date'     => $request->start_date,
            'end_date'    => $request->end_date
        ]);
        Alert::success('Success','Campaign Added Successfully');
        return redirect(route('admin.campaigns.all'));
    }

    public function show($campaignId)
    {

        $campaign = Campaign::with('campaignBanners')->where('id',$campaignId)->first();
        $campaignBanners = $campaign->campaignBanners;
        return view('Admin.Campaigns.show',compact('campaign','campaignBanners'));
    }

    public function changeStatus($campaignId)
    {
        $campaign = Campaign::find($campaignId);
        if ($campaign->active == 0){
            $campaign->update([
                'active'=>1
            ]);
            Alert::success('Success','Campaign Activated Successfully');
        }else{
            $campaign->update([
                'active'=>0
            ]);
            Alert::success('Success','Campaign DeActivated Successfully');
        }
        return redirect()->back();
    }

    public function edit($campaignId)
    {
        $campaign = Campaign::find($campaignId);

        return view('Admin.Campaigns.edit',compact('campaign'));
    }

    public function update($request)
    {
        $campaign = Campaign::find($request->id);

        $campaign->update([
            'name'  => $request->name,
            'start_date'    => $request->start_date,
            'end_date'     => $request->end_date,
        ]);
        Alert::success('Success','Campaign Updated Successfully');
        return redirect(route('admin.campaigns.all'));
    }

    public function delete($request)
    {
        Campaign::find($request->id)->delete();
        Alert::success('success','Campaign Deleted Successfully');
        return redirect()->back();
    }
}
