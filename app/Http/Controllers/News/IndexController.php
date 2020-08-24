<?php

namespace App\Http\Controllers\News;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        $news = News::query()->paginate(6);
        return view('news.index')->with('news', $news);
    }

    public function show(News $news) {
        if (isset($news)) {
            return view('news.one')->with('news', $news);
        } else {
            return view('news.newsError');
        }
    }
}
