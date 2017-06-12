<?php
return [
    'create' => 'Tạo Blog',
    'create_error' => 'Có lỗi khi tạo',
    'create_success' => 'Tạo thành công',
    'title' => 'Tiêu đề',
    'type' => 'Kiểu',
    'video' => 'Video',
    'image' => 'Ảnh',
    'validate' => [
        'image' => [
            'required' => 'Vui lòng chọn ảnh',
        ],
        'video' => [
            'required' => 'Vui lòng nhập - dán URL từ Youtube',
        ],
        'title' => [
            'required' => 'Vui lòng nhập tiêu đề blog',
            'minlength' => 'Vui lòng nhập ít nhất 10 ký tự',
        ],
    ],
];
