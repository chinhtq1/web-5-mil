<?php

namespace App\Http\Requests\Backend\DocumentCategories;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('store-documentcategory');
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
            'name.required' => 'Document category name must required',
            'name.max'      => 'Document category may not be greater than 191 characters.',
        ];
    }
}
