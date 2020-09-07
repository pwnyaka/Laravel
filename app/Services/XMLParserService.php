<?php


namespace App\Services;


use App\Category;
use App\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XMLParserService
{
    public function saveNews($link) {
        $xml = XmlParser::load($link);
        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,description,category,pubDate,enclosure::url,category]'],
        ]);


        foreach ($data['news'] as $news) {
            if ($news['category']) {
                $category = Category::query()->firstOrCreate([
                    'title' => $news['category'],
                    'slug' => Str::slug($news['category'], '-')
                ]);

                News::query()->firstOrCreate([
                    'title' => $news['title'],
                    'text' => $news['description'],
                    'isPrivate' => false,
                    'image' => $news['enclosure::url'],
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}