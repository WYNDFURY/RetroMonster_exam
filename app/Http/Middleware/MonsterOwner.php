<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MonsterOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $monster = $request->route('monster');

        if ($request->user()->id !== $monster->user_id) {
            return redirect()->route('pages.home')->with('error', 'You are not authorized to perform this action.');
        }

        return $next($request);
    }
}
