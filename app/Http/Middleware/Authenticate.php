<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\User;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson())
        {
            // $role = Auth::user()->role;
            // if($role == 'admin')
            // {
                // dd('hey you are admin');
            // }
            return route('login');
        }
    }
}
