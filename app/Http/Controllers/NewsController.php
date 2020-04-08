<?php

namespace App\Http\Controllers;

use App\models\Categories;
use App\models\News;
use App\models\Comments;
use Illuminate\Http\Request;

class NewsController extends Controller
{


    public function index()
    {
        return redirect('/news/category/1');
    }

    public function category($id)
    {
        if (!$model = Categories::query()
            ->where(['id' => $id, 'active' => 1])
            ->first()) {
            abort(404);
        }

        return view('news.category', [
            'model' => $model,
            'news' => News::query()->where('category_id', $id)->paginate(6)
        ]);
    }

    public function article($id)
    {
        if (!$model = News::query()
        ->where(['id' => $id, 'active' => 1])
        ->first()) {
            abort(404);
        }

        return view('news.article', [
            'model' => $model,
            'comments' => $model->comments()->orderBy('created_at', 'asc')->get()
        ]);

    }

    public function articleCreate(Request $request)
    {
        $model = new News();
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
            return back()->with('success', 'Новость добавлена и ожидает модерации!');
        }
        return view('news.create', [
            'categories' => Categories::getArrayCategories()
        ]);
    }

    public function leaveComment(Request $request)
    {
        $model = new Comments();
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
            return back()->with('success', 'Комментарий добавлен!');
        }
    }
}
