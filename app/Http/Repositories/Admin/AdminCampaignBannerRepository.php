<?php

namespace App\Http\Repositories\Admin;

use App\Http\Interfaces\Admin\AdminCampaignBannerInterface;
use App\Models\Banner;
use App\Models\Campaign;
use App\Models\CampaignBanner;
use App\Traits\ImagesTrait;
use RealRashid\SweetAlert\Facades\Alert;

class AdminCampaignBannerRepository implements AdminCampaignBannerInterface
{
    use ImagesTrait;


    public function create($campaignId)
    {
        $campaign = Campaign::find($campaignId);
        $banners = Banner::get();
        return view('Admin.CampaignBanners.create',compact('campaign','banners'));
    }

    public function store($request)
    {
        $imageName = time() . '_campaignBanner.'. $request->image->extension();
        $this->uploadImage($request->image,$imageName,'CampaignBanners');
        CampaignBanner::create([
            'image'         => $imageName,
            'campaign_id'   => $request->campaign_id,
            'banner_id'     => $request->banner_id,
        ]);

        Alert::success('Success','Campaign Banner Added Successfully');
        return redirect(route('admin.campaigns.show',$request->campaign_id));
    }


    public function delete($request)
    {
        $campaignBanner = CampaignBanner::find($request->id);
        unlink(public_path($campaignBanner->image));
        $campaignBanner->delete();
        Alert::success('Success','Campaign Banner Deleted Successfully');
        return redirect()->back();

    }
}
