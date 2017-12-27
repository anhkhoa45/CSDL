<?php

namespace App\Http\Middleware;

use Closure;

class CanUpdateCourse
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
        $user = auth()->user();
        if ($user->enrolledCourses()->where('id', $request->course)->buyers()->count()) {
            return redirect()->route('profile');
        }

        return $next($request);
    }
}
