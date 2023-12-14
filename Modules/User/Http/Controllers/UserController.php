<?php

namespace Modules\User\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Repositories\UserRepository;

class UserController extends Controller
{
    /** @var \App\Repositories\AbstractRepository */
    protected $userRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $users = $this->userRepository->paginate($search);

        return view('user::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('user.store'),
            'method'    => 'POST',
        ];

        return view('user::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'account'       => 'required|unique:users',
            'firstname'     => 'required',
            'lastname'      => 'required',
            'email'         => 'required|email|unique:users'
        ]);

        $this->userRepository->create($request->all());

        return redirect()->route('user.index')->with('success', 'create new user successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        return view('user::detail', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'title'     => 'Update',
            'url'       => route('user.update', $id),
            'method'    => 'PUT',
        ];

        $user = $this->userRepository->find($id);

        return view('user::edit', compact('form', 'user'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'account'       => 'required|unique:users,account,'.$id,
            'firstname'     => 'required',
            'lastname'      => 'required',
            'email'         => 'required|email|unique:users,email,'.$id
        ]);

        $this->userRepository->update($id, $request->all());

        return redirect()->route('user.index')->with('success', 'update user successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);

        return redirect()->route('user.index')->with('success', 'delete user successfully');
    }
}
