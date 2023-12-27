<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check is user logged in
        if (!auth()->check()) {
            return redirect()->route('home');
        }

        // get middleware parameters
        $roles = func_get_args();
        array_shift($roles);
        // dd($roles);

        // remove first index
        $roles = array_slice($roles, 1);

        // check role
        $user = auth()->user();

        if (!in_array($user->role, $roles)) {
            if ($user->role == 'mahasiswa') {
                return redirect()->route('mahasiswa.dashboard');
            } elseif ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('home');
        }

        return $next($request);
    }
}
