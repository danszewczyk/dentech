<?php

namespace App\Http\Middleware;

use Closure;

class isPatient
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

        if (!$request->session()->has('patient_id')) {
            return redirect()->route('staff.home')->with('info', 'select a patient');
        }

        return $next($request);
    }
}
