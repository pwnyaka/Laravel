<?php

namespace App;


class News
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'Text of news1 Text of news1 Text of news1 sport',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'Text of news2 Text of news2 Text of news2 policypolicypolicy',
            'category_id' => 2
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'Text of news3 Text of news3 Text of news3 sport',
            'category_id' => 1
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'Text of news4 Text of news4 Text of news4 policypolicypolicy',
            'category_id' => 2
        ],
        5 => [
            'id' => 5,
            'title' => 'Новость 5',
            'text' => 'Text of news5 Text of news5 Text of news5 cinema',
            'category_id' => 3
        ],
        6 => [
            'id' => 6,
            'title' => 'Новость 6',
            'text' => 'Text of news6 Text of news6 Text of news6 cinema',
            'category_id' => 3
        ]
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsOne($id) {
        try {
            return static::$news[$id];
        } catch (\Exception $exception) {
            return null;
        }

    }

    public static function getCategoryNews($id) {
        try {
            $array = [];
            foreach (static::$news as $item) {
                if ($item['category_id'] == $id) array_push($array, $item);
            }
            return $array;
        } catch (\Exception $exception) {
            return null;
        }
    }
}
