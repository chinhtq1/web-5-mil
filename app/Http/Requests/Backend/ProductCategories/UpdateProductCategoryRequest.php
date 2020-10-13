<?php

namespace App\Http\Requests\Backend\ProductCategories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-productcategory');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:191|unique:product_categories,name,' . $this->segment(3),
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Product category name already exists, please enter a different name.',
            'name.required' => 'Product category name must required',
            'name.max' => 'Product category may not be greater than 191 characters.',
        ];
    }
}
