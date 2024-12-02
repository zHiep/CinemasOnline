<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckBanned
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
        if (auth()->check() && (auth()->user()->status == 0)) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->back()->with('warning', 'Tài khoản của bạn đã bị khóa. Vui lòng liên hệ ban quản trị ! ');
        }
//        if (auth()->check() && (auth()->user()->email_verified == 0)) {
//            Auth::logout();
//
//            $request->session()->invalidate();
//
//            $request->session()->regenerateToken();
//
//            return redirect()->back()->with('warning', 'Tài khoản của bạn chưa kích hoạt.Vui lòng kích hoạt tài khoản ! ');
//        }
        return $next($request);
    }
}
