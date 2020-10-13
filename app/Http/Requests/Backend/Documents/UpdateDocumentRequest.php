<?php

namespace App\Http\Requests\Backend\Documents;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('update-document');
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
            'file' => 'max:10000',
            'categories' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please insert Document Title',
            'name.max' => 'Document Title may not be greater than 191 characters.',
            'file.max' => 'Kích thước file dưới 10MB'
        ];
    }
}
