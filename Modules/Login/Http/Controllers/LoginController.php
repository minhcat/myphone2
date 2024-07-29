<?php

namespace Modules\Login\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    /**
     * Show the login page.
     * @return Renderable
     */
    public function index()
    {
        return view('login::index');
    }

    /**
     * Handle the login request.
     * @param Request $request
     * @return Renderable
     */
    public function login(Request $request)
    {
        //
    }

    /**
     * Handle the logout request.
     * @param int $id
     * @return Renderable
     */
    public function logout()
    {
        //
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
    
