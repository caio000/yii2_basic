<?php
return [
    'administrador' => [
        'type' => 1,
        'children' => [
            'indexPost',
            'createPost',
            'updatePost',
            'deletePost',
            'createArtist',
            'view',
            'viewArtist',
            'createAlbum',
            'viewAllAlbums',
            'createMusic',
            'viewMusics',
        ],
    ],
    'supervisor' => [
        'type' => 1,
        'children' => [
            'indexPost',
            'createPost',
            'updatePost',
            'view',
            'viewArtist',
            'viewAllAlbums',
            'viewMusics',
        ],
    ],
    'operador' => [
        'type' => 1,
        'children' => [
            'indexPost',
            'view',
            'viewArtist',
            'viewAllAlbums',
            'viewMusics',
        ],
    ],
    'createPost' => [
        'type' => 2,
    ],
    'indexPost' => [
        'type' => 2,
    ],
    'updatePost' => [
        'type' => 2,
    ],
    'deletePost' => [
        'type' => 2,
    ],
    'createArtist' => [
        'type' => 2,
    ],
    'view' => [
        'type' => 2,
    ],
    'viewArtist' => [
        'type' => 2,
    ],
    'createAlbum' => [
        'type' => 2,
    ],
    'viewAllAlbums' => [
        'type' => 2,
    ],
    'createMusic' => [
        'type' => 2,
    ],
    'viewMusics' => [
        'type' => 2,
    ],
];
