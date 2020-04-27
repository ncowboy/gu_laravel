<?php

namespace App\Http\Controllers\Admin;

use App\models\Categories;
use App\models\Comments;
use App\models\News;
use App\models\RssFeeds;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RssFeedsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.rss-feeds.index', [
            'models' => RssFeeds::query()->paginate(20)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $model = new RssFeeds();
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();

            return redirect()->route("admin::rssFeeds::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.rss-feeds.create', [
            'model' => $model,
            'categories' => Categories::getArrayCategories()
        ]);
    }

    /**
     * @param Request $request
     * @param RssFeeds $model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(Request $request, RssFeeds $model)
    {
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
            return redirect()->route("admin::rssFeeds::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.rss-feeds.update', [
            'model' => $model,
            'categories' => Categories::getArrayCategories()
        ]);
    }

    /**
     * @param RssFeeds $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(RssFeeds $model)
    {
        if ($model->delete()) {
            return redirect()->route("admin::rssFeeds::index");
        }
    }
}
