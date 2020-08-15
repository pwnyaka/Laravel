<?php

namespace App\Http\Controllers;

use App\Categories;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('news.categories')->with('categories', Categories::getCategories());
    }

    public function show($categoryName) {
        $error = true;

        foreach (Categories::getCategories() as $category) {
            if ($category['slug'] == $categoryName) {
                $error = false;
                break;
            }
        }

        if (!$error) {
            $name = Categories::getCategoryTitleByName($categoryName);
            return view('news.category', ['category' => $name])->with('news', News::getNewsByCategoryName($categoryName));
        } else {
            return view('news.categoryError');
        }
    }
}
