<?php

namespace App\Http\Requests\Backend\Products;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-product');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
//            'name'              => 'required|max:191|unique:products,name,'.$this->segment(3),
            'name' => 'required|max:191',
            'publish_datetime' => 'required|date',
            'base_feature' => 'required',
            'detail_feature' => 'required',
            'content' => 'required',
            'categories' => 'required',
            'feature_image' => 'mimes:jpg,jpeg,png,ico| max: 5000 | dimensions:min_width=400,min_height=200, max_width=1200, max_height=800',

        ];
    }

    public function messages()
    {
        return [
//            'name.unique'   => 'Product name already exists, please enter a different name.',
            'name.required' => 'Please insert Product Title',
            'name.max' => 'Product Title may not be greater than 191 characters.',
            'feature_image.dimensions' => "Kích thước ảnh đề xuất: 450 x 300 ( hoặc tỉ lệ: 3 x 2 - min_width=400,min_height=200, max_width=1200, max_height=800 )",
            'feature_image.max' => 'Dung lượng ảnh dưới 5MB',
            'feature_image.mimes' => 'Ảnh đuôi jpg, jpeg, png, ico',
            ];
    }
}
