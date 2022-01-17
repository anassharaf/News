<?php

namespace App\Http\Requests\CampaignBanners;

use App\Models\CampaignBanner;
use Illuminate\Foundation\Http\FormRequest;

class AddCampaignBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $width = ($this->banner_id == 2)? 600 : 400;
        $height = ($this->banner_id == 2)? 100 : 400;

        return array_merge(CampaignBanner::rules(),['image'=>'required|image|dimensions:width='.$width.',height='.$height]);
    }
}
