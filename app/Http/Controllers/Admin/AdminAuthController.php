<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\AdminHandleLoginRequest;

class AdminAuthController extends Controller
{
    //Login Move to Blade
    public function login()
    {
        return view('admin.Auth.login');
    }

    //Login Function
    public function handleLogin(AdminHandleLoginRequest $request)
    {
        $request->authenticate();
        toast(__('You have  been login successfully!'), 'success');

        return redirect()->route('admin.dashboard');
    }

    //Logout Function
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        toast('Your have been logout successfully!', 'success');


        return redirect()->route('admin.login');
    }
}
