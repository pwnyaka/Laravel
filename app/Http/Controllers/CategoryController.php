<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('categories.categories')->with('categories', Categories::getCategories());
    }

    public function show($categoryLink) {
        if (isset(Categories::getCategories()[$categoryLink])) {
            $categoryId = Categories::getCategories()[$categoryLink]['id'];
            $categoryName = Categories::getCategories()[$categoryLink]['title'];
            return view('categories.news', ['category' => $categoryName])->with('news', News::getCategoryNews($categoryId));
        } else {
            return view('categories.error');
        }
    }
}
