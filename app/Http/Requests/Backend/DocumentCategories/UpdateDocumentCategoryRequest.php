<?php

namespace App\Http\Requests\Backend\DocumentCategories;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-documentcategory');
    }


    public function rules()
    {
        return [
            'name' => 'required|max:191|unique:documentcategories,name,' . $this->segment(3),
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Document category name already exists, please enter a different name.',
            'name.required' => 'Document category name must required',
            'name.max' => 'Document category may not be greater than 191 characters.',
        ];
    }
}
