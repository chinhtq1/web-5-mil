<?php

namespace App\Http\Requests\Backend\Settings;

use App\Http\Requests\Request;

/**
 * Class UpdateSettingsRequest.
 */
class UpdateSettingsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('edit-settings');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'logo' => 'image|dimensions:min_width=226,min_height=48',
            'favicon' => 'mimes:jpg,jpeg,png,ico|dimensions:min_width=16,min_height=16, max_width=32, max_height=32',

//            COMPANY
            'company_logo' => 'image|dimensions:max_width=125,max_height=125, min_width=64, min_height=64',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'logo.dimensions' => 'Invalid logo - should be minimum 226*48',
            'favicon.dimensions' => 'Invalid favicon - should be minimum 16*16 and maximum 32*32',

//            COMPANY
            'company_logo' => 'Kích thước ảnh không phù hợp. Kích thước tiêu chuẩn: 64*64 đến 125*125',

        ];
    }
}
