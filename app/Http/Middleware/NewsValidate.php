<?php

namespace App\Http\Middleware;

use App\models\News;
use Closure;
use Illuminate\Support\Facades\Validator;

class NewsValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rules = News::rules();
        if(!empty($request->route('model'))) {
            $rules['title'] = $rules['title'] . ', ' . $request->route('model')->id;
        }
        $validator = Validator::make($request->all(), $rules, [], News::attributeNames());
        if ($request->isMethod('post') && $validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
