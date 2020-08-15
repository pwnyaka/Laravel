<?php

namespace App;

class Categories
{
    private static $categories = [
        1 => [
            'id' => 1,
            'title' => 'Спорт',
            'slug' => 'sport'
        ],
        2 => [
            'id' => 2,
            'title' => 'Политика',
            'slug' => 'politics'
        ],
        3 => [
            'id' => 3,
            'title' => 'Кино',
            'slug' => 'cinema'
        ],
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryIdByName($name) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['slug'] == $name) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategoryById($id) {
        return static::$categories[$id];
    }

    public static function getCategoryTitleByName($categoryName) {
        foreach (static::$categories as $category) {
            if ($category['slug'] == $categoryName) {
                return $category['title'];
                break;
            }
        }
    }
}
