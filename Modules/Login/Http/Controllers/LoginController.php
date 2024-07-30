<?php

namespace Modules\Login\Http\Controllers;

use App\Enums\Gender;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\User\Repositories\UserRepository;

class LoginController extends Controller
{
    /** @var \Modules\User\Repositories\UserRepository */
    protected $userRepository;

    /**
     * Create new Cart Controller instance.
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

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
            return redirect()->route('admin')->with('success', __('notification.login.success'));
        } elseif (Auth::attempt($credentials_with_email)) {
            return redirect()->route('admin')->with('success', __('notification.login.success'));
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
    public function register()
    {
        $genders = Gender::getObject();

        return view('login::register', compact('genders'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        if ($request->input('agree_terms') === null) {
            return redirect()->back()->with('danger', __('notification.register.agree_terms_required'));
        }

        $request->validate([
            'account'   => 'required|unique:users',
            'email'     => 'required|unique:users',
            'firstname' => 'required',
            'lastname'  => 'required',
            'gender'    => 'numeric',
            'password'  => 'required|confirmed'
        ]);

        $this->userRepository->create($request->all(), ['is_admin' => true]);

        return redirect()->route('admin.login.index')->with('success', __('notification.register.success'));
    }
}
    
