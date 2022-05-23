<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CrewIsEnabledToManageOperators
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
        if(! $request->crew->isEnabled() )
            return redirect()->route('crews.show', $request->crew)->with('danger', 'Choose a crew enabled to manage operators.');

        return $next($request);
    }
}
