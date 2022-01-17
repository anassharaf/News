<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = ['name','start_date','end_date','active'];

    public static function rules()
    {
        return [
            'name'  =>'required',
            'start_date'=>'required|date',
            'end_date'  =>'required|date|after:start_date',
        ];
    }

    public static function deleteRules()
    {
        return [
            'id'    =>'required|exists:campaigns,id'
        ];
    }

    public function campaignBanners()
    {
        return $this->hasMany(CampaignBanner::class,'campaign_id','id');
    }

    public function getCampaignBannersByBannerId($id)
    {
        return CampaignBanner::where('campaign_id',$this->id)->where('banner_id',$id)->get();
    }
}
