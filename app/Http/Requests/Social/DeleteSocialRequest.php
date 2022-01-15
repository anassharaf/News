<?php

namespace App\Http\Requests\Social;

use App\Models\SocialMedia;
use Illuminate\Foundation\Http\FormRequest;

class DeleteSocialRequest extends FormRequest
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
        return SocialMedia::deleteRules();
    }
}
