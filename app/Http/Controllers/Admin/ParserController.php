<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Jobs\NewsParsing;
use App\News;
use App\Resources;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{


    public function index()
    {
        $rssLinks = Resources::all();

        foreach ($rssLinks as $rssLink) {
            NewsParsing::dispatch($rssLink->title);
        }

        return redirect()->route('Admin.news.index')->with('success', 'Новости успешно запарсены!');
    }

}
