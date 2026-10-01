<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends BaseController
{
    public function home()
    {
        $latest_article = Article::latest()->first();
        return view('frontend.home', compact('latest_article'));
    }

    public function category($slug)
    {
        $category = Category::where("slug", $slug)->first();
        $articles = $category->articles()->latest()->get();
        $advertises = Advertise::where("expire_date", ">=", today())->get();
        return view('frontend.category', compact('category', 'articles', "advertises"));
    }

    public function article($slug)
    {
        $article = Article::where("slug", $slug)->first();
        $advertises = Advertise::where("expire_date", ">=", today())->get();
        return view('frontend.article', compact('article', "advertises"));
    }


    public function search(Request $request)
    {
        // return $request;
        $query = $request->q;
        $articles = Article::where('title', 'like' ,"%$query%")->latest()->get();
        $advertises = Advertise::where("expire_date", ">=", today())->get();
        return view('frontend.search', compact('articles', 'advertises', 'query'));
    }

    public function about()
    {
        return view('frontend.about');
    }
}
