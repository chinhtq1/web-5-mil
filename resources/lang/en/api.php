<?php

return [

    'messages' => [
        'registeration' => [
            'success' => 'Bạn đã đăng ký thành công. Vui lòng kiểm tra email để kích hoạt',
        ],
        'login' => [
            'success' => 'Đăng nhập thành công',
            'failed'  => 'Đăng nhập sai. Vui lòng thử lại',
        ],
        'logout' => [
            'success' => 'Thoát ra thành công',
        ],
        'forgot_password' => [
            'success'    => 'Chúng tôi đã gửi link reset mật khẩu. Vui lòng kiểm tra email của bạn',
            'validation' => [
                'email_not_found' => 'Email chưa được đăng ký',
            ],
        ],
        'refresh' => [
            'token' => [
                'not_provided' => 'Token hết hạn',
            ],
            'status' => 'Ok',
        ],
    ],

];
