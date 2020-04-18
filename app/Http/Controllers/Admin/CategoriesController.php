<?php

namespace App\Http\Controllers\Admin;

use App\models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.categories.index', [
            'models' => Categories::query()->paginate(20)
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $model = new Categories();
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();

            return redirect()->route("admin::categories::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.categories.create', [
            'model' => $model
        ]);
    }

    /**
     * @param Request $request
     * @param Categories $model
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Categories $model)
    {
        if ($request->isMethod('post')) {
            $model->fill($request->all());
            $model->save();
            return redirect()->route("admin::categories::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.categories.update', [
            'model' => $model,
        ]);
    }

    /**
     * @param Categories $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Categories $model)
    {
        if ($model->delete()) {
            return redirect()->route("admin::categories::index");
        }
    }
}
