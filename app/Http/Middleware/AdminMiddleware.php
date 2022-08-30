<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;


class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if(Auth::check())
        // {
        //     if(Auth::user()->role_id == 1 && 2)
        //     {
        //         return $next($request); 
        //     }
        //     else{
        //         // return redirect()->route('customer.bookingList');
        //         // return response('Unauthorized.', 401);
        //         return  response()->view('auth.error401');
        //     // return redirect('/');
        //     }
        //     return redirect('/');

        // }
    }
}
