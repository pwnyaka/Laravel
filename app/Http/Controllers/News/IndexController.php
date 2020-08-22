<?php

namespace App\Http\Controllers\News;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index() {
        $news = DB::table('news')->get();
        return view('news.index')->with('news', $news);
    }

    public function show($id) {
        $news = DB::table('news')->find($id);
        if ($news) {
            return view('news.one')->with('news', $news);
        } else {
            return view('news.newsError');
        }
    }
}
