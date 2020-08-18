<?php

namespace App;


class News
{
    public static function getNews() {
        return json_decode(\File::get(\Storage::path('public/news.txt')), true);
    }

    public static function getNewsOne($id) {
        $news = static::getNews();
        return $news[$id];

    }

    public static function getNewsByCategoryName($name) {
        $id = Categories::getCategoryIdByName($name);
        $news = [];
        foreach (static::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
