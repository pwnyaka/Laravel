<?php

namespace App\Http\Controllers\Admin;

use App\Categories;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

            $addedNews = $request->except('_token');

            $imgName = null;

            if ($request->file('image')) {
                $path = \Storage::putFile('public/img', $request->file('image'));
                $name = \Storage::url($path);
                $addedNews['image'] = $name;
            } else {
                $addedNews['image'] = $imgName;
            }

            DB::table('news')->insert($addedNews);

            return redirect()->route('News.index');

        }

        return view('admin.create', [
            'categories' => DB::table('categories')->get()
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
