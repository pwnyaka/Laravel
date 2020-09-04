<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserController extends Controller
{

    protected static $data;

    public function index()
    {
        $xml = XmlParser::load('https://lenta.ru/rss/last24');
        static::$data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'description' => ['uses' => 'channel.description'],
            'image' => ['uses' => 'channel.image.url'],
            'news' => ['uses' => 'channel.item[title,description,category]'],
        ]);
        $this->_fillCategories();
        $this->_fillNews();

        return redirect()->route('Admin.news.index')->with('success', 'Новости успешно запарсены!');
    }

    public function _fillCategories() {
        foreach (static::$data['news'] as $item) {
            if (Category::query()->where('title', '=', $item['category'])->count()) {
                continue;
            }
            $category = new Category();
            $category->fill([
                'title' => $item['category'],
                'slug' => Str::slug($item['category'], '-'),
            ])->save();

        }
    }

    public function _fillNews() {
        foreach (static::$data['news'] as $item) {
            if (News::query()->where('title', '=', $item['title'])->count()) {
                continue;
            }
            $news = new News();
            $news->fill([
                'title' => $item['title'],
                'text' => $item['description'],
                'category_id' => Category::query()->where('title', '=', $item['category'])->first()->id,
                'isPrivate' => false,
                'image' => static::$data['image']
            ])->save();
        }
    }
}
