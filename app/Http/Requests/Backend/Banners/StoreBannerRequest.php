<?php

namespace App\Http\Requests\Backend\Banners;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-banner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title1' => 'required|max:191',
            'title2' => 'required|max:191',
            'featured_image' => 'required | max: 5000 | mimes:jpg,jpeg,png,ico|dimensions:min_width=1300,min_height=450, max_width=1800, max_height=700',
        ];
    }

    public function messages()
    {
        return [
            'featured_image.dimensions' => 'Kích thước ảnh không phù hợp. Đề xuất tỷ lệ 3 x 1 - min_width=1300,min_height=450, max_width=1800, max_height=700', //The Custom messages would go in here
            'featured_image.max' => 'Dung lượng ảnh dưới 5MB',
            'featured_image.mimes' => 'Ảnh đuôi jpg, jpeg, png, ico',
        ];
    }
}
