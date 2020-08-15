<?php

namespace App\Http\Controllers\News;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('news.index')->with('news', News::getNews());
    }

    public function show($id) {
        if (array_key_exists($id, News::getNews())) {
            return view('news.one')->with('news', News::getNewsOne($id));
        } else {
            return view('news.newsError');
        }
    }
}
