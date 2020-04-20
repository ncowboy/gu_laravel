<?php

namespace App\Http\Middleware;

use App\models\Categories;
use Closure;
use Illuminate\Support\Facades\Validator;

class CategoryValidate
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rules = Categories::rules();

        if(!empty($request->route('model'))) {
            $rules['name'] = $rules['name'] . ', ' . $request->route('model')->id;
        }

        $validator = Validator::make($request->all(), $rules, [], Categories::attributeNames());
        if ($request->isMethod('post') && $validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
