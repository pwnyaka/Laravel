<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {

            $this->validate($request, [
                'title' => 'required|max:255',
                'text' => 'required',
            ]);

            $newsContent = News::getNews();

            $addedNews = $request->except('_token');
            $addedNews = ['id' => end($newsContent)['id'] + 1] + $addedNews;
            if ($request->exists('isPrivate')) {
                $addedNews['isPrivate'] = true;
            } else {
                $addedNews['isPrivate'] = false;
            }
            array_push($newsContent, $addedNews);
            $newsContent = json_encode($newsContent);
            $path = \Storage::path('public/news.txt');
            \File::put($path, $newsContent);
            return redirect()->route('News.index');

        }

        return view('admin.create', [
            'categories' => Categories::getCategories()
        ]);
    }

    public function showUsers()
    {
        return view('admin.users');
    }

    public function editNews()
    {
        return view('admin.editNews');
    }
}
