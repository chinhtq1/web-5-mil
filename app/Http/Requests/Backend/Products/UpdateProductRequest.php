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
            'name' => 'required|max:191|unique:products,name,'.$this->segment(3),

        ];
    }

    public function messages()
    {
        return [
            'name.unique'   => 'Blog name already exists, please enter a different name.',
            'name.required' => 'Please insert Blog Title',
            'name.max'      => 'Blog Title may not be greater than 191 characters.',
        ];
    }
}
