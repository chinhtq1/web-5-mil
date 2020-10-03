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
            'name'              => 'required|max:191',
            'feature_image'    => 'required',
            'publish_datetime'  => 'required|date',
            'base_feature'      => 'required',
            'detail_feature'    => 'required',
            'content'           => 'required',
            'categories'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert Product Title',
            'name.max'      => 'Product Title may not be greater than 191 characters.',
        ];
    }
}
