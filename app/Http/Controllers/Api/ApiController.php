<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CategoryResource;
use App\Models\Advertise;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function latest_article()
    {
        $latest_article = Article::latest()->first();
        // return response()->json($latest_article);
        return new ArticleResource($latest_article);
    }

    public function advertises()
    {
        $advertises = Advertise::where("expire_date", ">=", today())->get();
        return response()->json($advertises);
    }
}
