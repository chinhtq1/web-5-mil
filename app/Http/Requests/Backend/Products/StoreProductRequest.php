<?php

namespace App\Http\Requests\Backend\Products;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-product');
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
            'feature_image' => 'required | mimes:jpg,jpeg,png,ico|max: 5000 | dimensions:min_width=400,min_height=200, max_width=1200, max_height=800',
            'publish_datetime' => 'required|date',
            'base_feature' => 'required',
            'detail_feature' => 'required',
            'content' => 'required',
            'categories' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert Product Title',
            'name.max' => 'Product Title may not be greater than 191 characters.',
            'feature_image.dimensions' => "Kích thước ảnh đề xuất: 450 x 300 ( hoặc tỉ lệ: 3 x 2 - min_width=400,min_height=200, max_width=1200, max_height=800 )",
            'feature_image.max' => 'Dung lượng ảnh dưới 5MB',
            'feature_image.mimes' => 'Ảnh đuôi jpg, jpeg, png, ico',
        ];
    }
}
