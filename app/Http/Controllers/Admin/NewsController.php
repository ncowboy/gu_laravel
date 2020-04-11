<?php

namespace App\Http\Controllers\Admin;

use App\models\Categories;
use App\models\News;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', [
            'models' => News::query()->paginate(20)
        ]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $model = new News();
            $model->fill($request->all());
            $model->save();

            return redirect()->route("admin::news::index");
        }

        return view('admin.news.create', [
            'categories' => Categories::getArrayCategories(),
            'authors' => User::getArrayUsers()
        ]);
    }

    public function update(Request $request, News $model)
    {
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
            return redirect()->route("admin::news::index");
        }

        return view('admin.news.update', [
            'model' => $model,
            'categories' => Categories::getArrayCategories(),
            'authors' => User::getArrayUsers()
        ]);
    }

    /**
     * @param News $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(News $model)
    {
        if($model->delete()) {
            return redirect()->route("admin::news::index");
        }
    }
}
