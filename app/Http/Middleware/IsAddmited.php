<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class IsAddmited
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
        if(Auth::user()->application_status == 0){
            echo "
            <script>
                alert('Sorry you have not been addmited check back');
                window.location= '/';
            </script>
            ";
        }
        return $next($request);
    }
}
