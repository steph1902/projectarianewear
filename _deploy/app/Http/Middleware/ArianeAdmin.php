<?php

namespace App\Http\Middleware;

use Closure;

class ArianeAdmin
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
        return $next($request);
        // return view('');'
        // strcmp($str1, $str2);
        // if(strcmp($request->email,'admin.ariane@gmail.com')==0)
        // {
        //     // dd('here');
        //     return redirect()->route('sitemap');
        // }
        // else if(strcmp($request->email,'admin.ariane@gmail.com')!=0)
        // {
        //     return redirect()->route('ariane-admin-login');
        // }


    }
}
