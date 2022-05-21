<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use DB;
use Session;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            $homeTop = DB::table('index_home_pages')
                ->get();
            $homeName =   $homeTop[0]->webName;
            Session::put('nameWbe', $homeName);
           
            return route('login');
        }
    }
}
