<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Authenticate
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user_id')) {
            return redirect()->route('login');
        }

        $request->setUserResolver(function () {
            return \App\Models\User::find(Session::get('user_id'));
        });

        return $next($request);
    }
}
