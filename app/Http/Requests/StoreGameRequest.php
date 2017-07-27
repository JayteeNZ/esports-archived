<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
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
        return [
            'name' => 'required',
            'display_name' => 'required',
            'slug' => 'required|alpha_dash',
            'identifier' => 'nullable',
            'platform_id' => 'required|numeric',
            'background_cover' => 'image:jpeg,jpg,png',
            'avatar_image' => 'image:jpeg,jpg,png',
            'visible' => 'boolean'
        ];
    }

    public function messages()
    {
        return [
            'platform_id.numeric' => 'The platform is required'
        ];
    }
}
