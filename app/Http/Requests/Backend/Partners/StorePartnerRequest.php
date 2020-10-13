<?php

namespace App\Http\Requests\Backend\Partners;

use Illuminate\Foundation\Http\FormRequest;

class StorePartnerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-partner');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191',
            'featured_image' => 'required | max: 2000 | mimes:jpg,jpeg,png,ico|dimensions:min_width=64,min_height=64, max_width=300, max_height=300',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert name',
            'featured_image.dimensions' => 'Kích thước ảnh đề xuất: 150 x 150 ( hoặc tỉ lệ: 3 x 2, 1 x 1 ) - min_width=64,min_height=64, max_width=300, max_height=300',
            'featured_image.max' => 'Dung lượng ảnh dưới 2MB',
            'featured_image.mimes' => 'Ảnh đuôi jpg, jpeg, png, ico',
            ];
    }
}
