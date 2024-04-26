<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewMiddlewareName
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
        // Kiểm tra xem người dùng có đăng nhập không
        if (Auth::check()) {
            // Kiểm tra xem người dùng có quyền admin hay không
            if (Auth::user()->role == 'admin') {
                return $next($request);
            }
        }

        // Nếu không phải là admin, bạn có thể điều hướng về trang khác hoặc hiển thị thông báo lỗi
        return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
    }
}
