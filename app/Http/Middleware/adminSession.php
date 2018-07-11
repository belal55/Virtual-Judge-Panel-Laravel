<?php

namespace App\Http\Middleware;

use Closure;

class adminSession
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
        if($request->session()->get('user')->user_type_id!=1){
            $request->session()->flush();
            $request->session()->flash('message', 'Opps!! You are not an admin.');
            return redirect()->route('login.index');
        }
        return $next($request);
    }
}
