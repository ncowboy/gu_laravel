<?php

namespace App\Http\Controllers\Admin;

use App\models\Categories;
use App\models\News;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\NewsParsing;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index', [
            'models' => News::query()->paginate(20),
            'categories' => Categories::query()->where(['main' => false])->get()
                ->mapWithKeys(function ($item) {
                    return [
                        $item['id'] => $item['name']
                    ];
                })
        ]);
    }

    public function create(Request $request)
    {
        $model = new News();
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();

            return redirect()->route("admin::news::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.news.create', [
            'categories' => Categories::getArrayCategories(),
            'authors' => User::getArrayUsers(),
            'model' => $model
        ]);
    }

    public function update(Request $request, News $model)
    {
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
            return redirect()->route("admin::news::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
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
        if ($model->delete()) {
            return redirect()->route("admin::news::index");
        }
    }

    /**
     * @param Request $request
     */
    public function parseXML(Request $request)
    {
        if ($request->isMethod('post')) {

            NewsParsing::dispatch($request->get('category_id'), \Auth::id());

            return redirect()->route('admin::news::index');
        }
    }
}
