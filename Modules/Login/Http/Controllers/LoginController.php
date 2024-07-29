<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login page.
     * @return Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('admin');
        }
        return view('login::index');
    }

    /**
     * Handle the login request.
     * @param Request $request
     * @return Renderable
     */
    public function login(Request $request)
    {
        $credentials_with_account = $request->validate([
            'account'   => 'required',
            'password'  => 'required',
        ]);

        $credentials_with_email = [
            'email'     => $credentials_with_account['account'],
            'password'  => $credentials_with_account['password']
        ];

        if (Auth::attempt($credentials_with_account)) {
            return redirect()->route('admin')->with('success', 'Login successfully');
        } elseif (Auth::attempt($credentials_with_email)) {
            return redirect()->route('admin')->with('success', 'Login successfully');
        }
        return redirect()->back()->with('danger', 'Email/account or password is not match');
    }

    /**
     * Handle the logout request.
     * @param int $id
     * @return Renderable
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('admin.login.index');
    }

    /**
     * Show the register page.
     * @param int $id
     * @return Renderable
     */
    public function signup()
    {
        return view('login::show');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function register(Request $request)
    {
        //
    }
}
    
