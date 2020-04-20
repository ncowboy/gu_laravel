<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Validator;

class UsersValidate
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
        $rules = User::rules();
        if(!empty($request->route('model'))) {
            $rules['email'] = $rules['email'] . ', ' . $request->route('model')->id;
        }
        $validator = Validator::make($request->all(), $rules, [], User::attributeNames());
        if ($request->isMethod('post') && $validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
