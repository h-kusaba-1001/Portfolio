<?php

return [
    'admin_user' => [
        'name'      => env('ADMIN_NAME'),
        'email'     => env('ADMIN_EMAIL'),
        'password'  => env('ADMIN_PASSWORD')
    ],
    'admin_url' => env('ADMIN_URL'),

    'flush' => [
        'store' => [
            'success'   => '：新規作成に成功しました。',
            'failed'    => '：新規作成に失敗しました。'
        ],
        'delete' => [
            'success'   => '：削除に成功しました。',
            'failed'    => '：削除に失敗しました。'
        ],
    ]
];
