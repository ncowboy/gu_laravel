<?php

namespace App\Http\Middleware;

use App\models\News;
use App\models\RssFeeds;
use Closure;
use Illuminate\Support\Facades\Validator;

class RssFeedValidate
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
        $rules = RssFeeds::rules();

        $validator = Validator::make($request->all(), $rules, [], RssFeeds::attributeNames());
        if ($request->isMethod('post') && $validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
