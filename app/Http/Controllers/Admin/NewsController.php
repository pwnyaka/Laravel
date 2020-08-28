<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::query()->paginate(6);

        return view('admin.news.index')->with('news', $news);
    }

    public function create()
    {
        $news = new News();
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'title'])->get()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        $news = new News();

        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $data['image'] = \Storage::url($path);
        }

        $this->validate($request, News::rules(), [], News::attrNames());

        $result = $news->fill($data)->save();

        if ($result) {
            return redirect()->route('Admin.news.create')->with('success', 'Новость добавлена успешно!');
        } else {
            return redirect()->route('Admin.news.create')->with('error', 'Ошибка добавления новости!');
        }


    }

    public function edit(News $news)
    {
        return view('admin.news.create', [
            'news' => $news,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, News $news)
    {
        $name = null;
        if ($request->file('image')) {
            $path = \Storage::putFile('public/images', $request->file('image'));
            $name = \Storage::url($path);
        }

        $data = $request->except('_token');
        if (!isset($data['isPrivate'])) $data['isPrivate'] = 0;

        $this->validate($request, News::rules(), [], News::attrNames());
        $result = $news->fill($data)->save();

        if ($result) {
            return redirect()->route('Admin.news.create')->with('success', 'Новость добавлена успешно!');
        } else {
            return redirect()->route('Admin.news.create')->with('error', 'Ошибка добавления новости!');
        }
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('Admin.news.index')->with('success', 'Новость удалена успешно!');
    }
}
