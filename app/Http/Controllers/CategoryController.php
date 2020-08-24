<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($name) {

        $category = Category::query()->where('slug', $name)->first();

        $error = $category ? false : true;

        if (!$error) {
            $news = $category->news;
            $categoryName = $category->value('title');
            return view('news.category', ['category' => $categoryName])->with('news', $news);
        } else {
            return view('news.categoryError');
        }

    }
}
