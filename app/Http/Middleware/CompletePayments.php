<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class CompletePayments
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
        if(Auth::user()->payment_status == 0){
            session()->put('paymenterror', 'Please pay your school fees before clicking this address / link');
            return redirect('/profile');
        }
        return $next($request);
    }
}
