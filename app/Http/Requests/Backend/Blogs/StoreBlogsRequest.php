<?php

namespace App\Http\Requests\Backend\Blogs;

use App\Http\Requests\Request;

/**
 * Class StoreBlogsRequest.
 */
class StoreBlogsRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return access()->allow('create-blog');
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
            'publish_datetime' => 'required|date',
            'content' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'featured_image' => 'required | mimes:jpg,jpeg,png,ico|dimensions:min_width=500,min_height=200, max_width=1500, max_height=1000 | max: 5000',
        ];
    }

    /**
     * Get the validation message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Please insert Blog Title',
            'name.max' => 'Blog Title may not be greater than 191 characters.',
            'featured_image.dimensions' => 'Kích thước ảnh đề xuất: 900 x 500 ( hoặc tỉ lệ: 3 x 2 ) - min_width=500,min_height=200, max_width=1500, max_height=1000',
            'featured_image.max' => 'Dung lượng ảnh dưới 5MB',
            'featured_image.mimes' => 'Ảnh đuôi jpg, jpeg, png, ico',
        ];
    }
}
