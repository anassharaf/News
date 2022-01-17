<?php

namespace App\Http\Requests\CampaignBanners;

use App\Models\CampaignBanner;
use Illuminate\Foundation\Http\FormRequest;

class DeleteCampaignBannerRequest extends FormRequest
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
        return CampaignBanner::deleteRules();
    }
}
