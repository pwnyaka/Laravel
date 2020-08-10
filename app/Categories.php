<?php

namespace App;

class Categories
{
    private static $categories = [
        'sport' => [
            'id' => 1,
            'title' => 'Спорт',
            'link' => 'sport'
        ],
        'policy' => [
            'id' => 2,
            'title' => 'Политика',
            'link' => 'policy'
        ],
        'cinema' => [
            'id' => 3,
            'title' => 'Кино',
            'link' => 'cinema'
        ]

    ];

    public static function getCategories() {
        return static::$categories;
    }
}
