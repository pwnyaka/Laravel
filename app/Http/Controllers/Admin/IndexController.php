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
       return redirect()->route('Admin.news.index');
    }

    public function showUsers()
    {
        return view('admin.users');
    }

}
