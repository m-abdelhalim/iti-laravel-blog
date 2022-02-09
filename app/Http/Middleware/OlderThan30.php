<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class OlderThan30
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
        $now = Carbon::createFromFormat('Y-m-d', now()->format('Y-m-d'));
        $user_dob = Carbon::createFromFormat('Y-m-d',  auth()->user()->dob);
        if($now->diffInYears($user_dob) >= 30)
            return $next($request);
        else
            return redirect()->route('category.list');
    }
}
