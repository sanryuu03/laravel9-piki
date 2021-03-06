<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CekLevel
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
        $user = User::where('name', $request->name)->first();
        if (!Auth::check()) {
            return redirect('/login');
        }
        $user = Auth::user();
        // return $user;
        if ($user->level != "anggota") {
            # code...
            return $next($request);
        } elseif ($user->level == "anggota") {
            // dd($user->id);
            return $next($request);
            // return redirect()->route('profile', $user->id);
        }
        return redirect('/login')->with('error',"kamu gak punya akses");
    }
}
