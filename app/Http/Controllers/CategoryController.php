<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index() {
        $categories = DB::table('categories')->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($categoryName) {
        $record = DB::table('categories')->where('slug', $categoryName)->first();
        $error = $record ? false : true;

        $news = DB::table('news')->where('category_id', $record->id)->get();

        if (!$error) {
            $name = $record->title;
            return view('news.category', ['category' => $name])->with('news', $news);
        } else {
            return view('news.categoryError');
        }
    }
}
