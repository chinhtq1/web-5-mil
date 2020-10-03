<?php

namespace App\Http\Requests\Backend\ProductCategories;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-productcategory');
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
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product category name must required',
            'name.max'      => 'Product category may not be greater than 191 characters.',
        ];
    }
}
