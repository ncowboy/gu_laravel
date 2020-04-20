<?php

namespace App\Http\Middleware;

use App\models\Comments;
use Closure;
use Illuminate\Support\Facades\Validator;

class CommentValidate
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
        $validator = Validator::make($request->all(), Comments::rules(), [], Comments::attributeNames());
        if ($request->isMethod('post') && $validator->fails()) {
            return redirect()->back()
                ->withErrors($validator->errors())
                ->withInput();
        }
        return $next($request);
    }
}
