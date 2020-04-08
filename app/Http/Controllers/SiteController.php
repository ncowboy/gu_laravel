<?php

namespace App\Http\Controllers;

use App\models\Categories;
use Illuminate\Http\Request;
use App\models\News;

class SiteController extends Controller
{
    public function index()
    {
        $mainCategory= Categories::query()->select('id')->where(['main' => true])->get();
        $mainCategoryId = $mainCategory->isNotEmpty() ? $mainCategory[0]->id : null;
        $categories = Categories::query()->where('main', 'IS NOT', $mainCategoryId)->where('active', 1)->get();
        $news = News::all();
        return view('index', [
            'news' => $news->isEmpty() || $news->count() < 4 ? null : $news->random(4),
            'categories' => $categories,
            'mainCategoryId' => $mainCategoryId
        ]);
    }
}
