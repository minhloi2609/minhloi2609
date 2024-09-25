<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    protected function authenticated(Request $request, $user)
    {
        if ($user->status != '1') {
            // Trạng thái không phải '1', đăng xuất và chuyển hướng đến trang đăng nhập
            Auth::logout();
            return Redirect::to('login')->withErrors(['status' => 'Tài khoản của bạn đã bị khóa.']);
        }

        if ($user->role === 'admin') {
            // Vai trò là 'admin', chuyển hướng đến trang admin
            return redirect()->route('admin.home');
        } elseif ($user->role === 'user') {
            // Vai trò là 'user', chuyển hướng đến trang home
            return redirect()->route('home');
        }
    }
}
