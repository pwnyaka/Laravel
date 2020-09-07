<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(6);
        return view('admin.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        $category = new Category();
        return view('admin.categories.create', [
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $category = new Category();

        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['title'], '-');
        $this->validate($request, Category::rules(), [], Category::attrNames());
        $result = $category->fill($data)->save();

        if ($result) {
            return redirect()->route('Admin.categories.index')->with('success', 'Категория добавлена успешно!');
        } else {
            return redirect()->route('Admin.categories.index')->with('error', 'Ошибка добавления категории!');
        }
    }

    public function edit(Category $category)
    {
        return view('admin.categories.create', [
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {

        $data = $request->except('_token');
        $data['slug'] = Str::slug($data['title'], '-');

        $this->validate($request, Category::rules(), [], Category::attrNames());
        $result = $category->fill($data)->save();

        if ($result) {
            return redirect()->route('Admin.categories.index')->with('success', 'Категория добавлена успешно!');
        } else {
            return redirect()->route('Admin.categories.index')->with('error', 'Ошибка добавления категории!');
        }
    }

    public function destroy(Category $category)
    {
        dd($category);
        $category->news()->delete();
        $category->delete();
        return redirect()->route('Admin.categories.index')->with('success', 'Категория удалена успешно!');
    }
}
