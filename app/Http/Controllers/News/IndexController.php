<?php

namespace App\Http\Controllers\News;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('news.news')->with('news', News::getNews());
    }

    public function show($id) {
        if (News::getNewsOne($id)) {
            return view('news.NewsOne')->with('news', News::getNewsOne($id));
        } else {
            return view('news.error');
        }
    }
}
