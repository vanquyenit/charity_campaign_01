<?php
return [
    'create' => 'Create Blog',
    'create_error' => 'Create blog error',
    'create_success' => 'Create blog success',
    'title' => 'Title',
    'type' => 'Type',
    'video' => 'Video',
    'image' => 'Image',
    'validate' => [
        'image' => [
            'required' => 'Image is required',
        ],
        'video' => [
            'required' => 'Please enter URL Youtube',
        ],
        'title' => [
            'required' => 'Title is required',
            'minlength' => 'Please enter at least 10 characters',
        ],
    ],
];
