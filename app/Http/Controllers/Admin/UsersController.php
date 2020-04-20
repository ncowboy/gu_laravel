<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.users.index', [
            'models' => User::query()->paginate(20)
        ]);
    }

    public function update(Request $request, User $model)
    {
        if ($request->isMethod('post')) {
            $model->fill([
                    'name' => $request->post('name'),
                    'email' => $request->post('email'),
                    'is_admin' => $request->post('is_admin')
                ]
            );

            if (!empty($request->post('newPassword'))) {
                $model->fill(['password' => \Hash::make($request->post('newPassword'))]);
            }

            $model->save();

            return redirect()->route('admin::users::index');
        }
        return view('admin.users.update', ['model' => $model]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $model = new User();
        if ($request->isMethod('post')) {
            $model->fill([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => \Hash::make($request->get('password')),
                'is_admin' => $request->get('is_admin'),
            ]);
            $model->save();
            return redirect()->route("admin::users::index");
        }

        if (!empty($request->old())) {
            $model->fill($request->old());
        }

        return view('admin.users.create', [
            'model' => $model
        ]);
    }

    /**
     * @param User $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(User $model)
    {
        if ($model->delete()) {
            return redirect()->route("admin::users::index");
        }
    }
}
