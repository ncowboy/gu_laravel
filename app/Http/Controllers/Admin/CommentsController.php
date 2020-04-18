<?php

namespace App\Http\Controllers\Admin;

use App\models\Comments;
use App\models\News;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.comments.index', [
            'models' => Comments::query()->paginate(20)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $model = new Comments();
        if ($request->isMethod('post')
            && $this->validate($request, Comments::rules(), [], Comments::attributeNames())) {
            $model->fill($request->all());
            $model->save();

            return redirect()->route("admin::comments::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.comments.create', [
            'model' => $model,
            'articles' => News::getArrayNews(),
            'authors' => User::getArrayUsers()
        ]);
    }

    /**
     * @param Request $request
     * @param Comments $model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function update(Request $request, Comments $model)
    {
        if ($request->isMethod('post')
            && $this->validate($request, Comments::rules(), [], Comments::attributeNames())) {
            $model->fill($request->all());
            $model->save();
            return redirect()->route("admin::comments::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.comments.update', [
            'model' => $model,
            'articles' => News::getArrayNews(),
            'authors' => User::getArrayUsers()
        ]);
    }

    /**
     * @param Comments $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Comments $model)
    {
        if ($model->delete()) {
            return redirect()->route("admin::comments::index");
        }
    }
}
