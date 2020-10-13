<?php

namespace App\Http\Requests\Backend\Subcribes;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubcribeRequest extends FormRequest
{

    public function rules()
    {
        return [
            //Put your rules for the request in here
            //For Example : 'title' => 'required'
            //Further, see the documentation : https://laravel.com/docs/6.x/validation#creating-form-requests
            'name' => 'required |max:255',
            'phone' => 'required |regex: /([0-9]*$)/u | min:10 | max: 20',
            'email' => 'required | email | min: 5 | max: 30',
            'message' => 'required | max: 256'
        ];
    }

    public function messages()
    {
        return [
            //The Custom messages would go in here
            //For Example : 'title.required' => 'You need to fill in the title field.'
            //Further, see the documentation : https://laravel.com/docs/6.x/validation#customizing-the-error-messages
            'name.required' => 'Vui lòng nhập tên',
            'name.max' => 'Tên quá dài',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.regex' => 'Số điện thoại thoại không đúng',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Không đúng định dạng',
            'email.min' => 'Chiều dài email không phù hợp ( từ 5-30 )',
            'email.max' => 'Chiều dài email không phù hợp ( từ 5-30 )',
            'phone.min' => 'Chiều dài phone không phù hợp ( từ 5-30 )',
            'phone.max' => 'Chiều dài phone không phù hợp ( từ 5-30 )',
            'message.required' => "Vui lòng nhập tin nhắn",
            'message.max' => 'Tin nhắn quá dài'
        ];
    }
}
