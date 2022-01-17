<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignBanner extends Model
{
    use HasFactory;

    protected $fillable = ['campaign_id','banner_id','image'];

    public function getImageAttribute($value)
    {
        return 'Images/CampaignBanners/'.$value;
    }

    public static function rules()
    {
        return [
            'campaign_id'   => 'required|exists:campaigns,id',
            'banner_id'     => 'required|exists:banners,id',
        ];
    }

    public static function deleteRules()
    {
        return [
            'id'    =>'required|exists:campaign_banners,id'
        ];
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class,'campaign_id','id')->first()->name;
    }

    public function banner()
    {
        return $this->belongsTo(Banner::class,'banner_id','id')->first()->position;
    }

    public function imageWidth()
    {
        return $this->belongsTo(Banner::class,'banner_id','id')->first()->width;
    }

    public function imageHeight()
    {
        return $this->belongsTo(Banner::class,'banner_id','id')->first()->height;
    }

}
