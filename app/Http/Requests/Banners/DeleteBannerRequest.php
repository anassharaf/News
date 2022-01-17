<?php

namespace App\Http\Requests\Banners;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;

class DeleteBannerRequest extends FormRequest
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
        return Banner::deleteRules();
    }
}