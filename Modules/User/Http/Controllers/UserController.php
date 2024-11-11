<?php

namespace Modules\User\Http\Controllers;

use App\Enums\Gender;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class UserController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\User\Repositories\UserRepository */
    protected $userRepository;

    /** @var \Modules\User\Repositories\UserRepository */
    protected $roleRepository;

    /**
     * Create a new user controller instance.
     */
    public function __construct()
    {
        $this->userRepository = new UserRepository();
        $this->roleRepository = new RoleRepository();

        view()->share('menu', ['group' => 'user', 'active' => 'user']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('user:browse');

            $search   = $request->input('search');
            $users = $this->userRepository->paginate($search);
    
            return view('user::user.index', compact('users'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse user']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('user:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.user.store'),
                'method'    => 'POST',
            ];
    
            $genders = Gender::getObject();
            $roles = $this->roleRepository->all();
    
            return view('user::user.create', compact('form', 'genders', 'roles'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.user.index')->with('danger', __('notification.permission.fail', ['action' => 'add user']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $this->authorize('user:add');

            $request->validate([
                'account'       => 'required|unique:users',
                'firstname'     => 'required',
                'lastname'      => 'required',
                'email'         => 'required|email|unique:users'
            ]);
    
            $user = $this->userRepository->create($request->all());
            $this->userRepository->updateRole($user, $request->input('role'));
    
            return redirect()->route('admin.user.index')->with('success', __('notification.create.success', ['model' => 'user']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.user.index')->with('danger', __('notification.permission.fail', ['action' => 'add user']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        try {
            $this->authorize('user:read');

            $user = $this->userRepository->find($id);
    
            return view('user::user.show', compact('user'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.user.index')->with('danger', __('notification.permission.fail', ['action' => 'read user']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $this->authorize('user:edit');

            $form = [
                'title'     => 'Update',
                'url'       => route('admin.user.update', $id),
                'method'    => 'PUT',
            ];
            
            $user = $this->userRepository->find($id);
            $genders = Gender::getObject();
            $roles = $this->roleRepository->all();
    
            return view('user::user.edit', compact('form', 'user', 'genders', 'roles'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.user.index')->with('danger', __('notification.permission.fail', ['action' => 'edit user']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            $this->authorize('user:edit');

            $request->validate([
                'account'       => 'required|unique:users,account,'.$id,
                'firstname'     => 'required',
                'lastname'      => 'required',
                'email'         => 'required|email|unique:users,email,'.$id
            ]);
    
            $user = $this->userRepository->update($id, $request->all());
            $this->userRepository->updateRole($user, $request->input('role'));
    
            return redirect()->route('admin.user.index')->with('success', __('notification.update.success', ['model' => 'user']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.user.index')->with('danger', __('notification.permission.fail', ['action' => 'edit user']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $this->authorize('user:delete');

            $this->userRepository->delete($id);
    
            return redirect()->route('admin.user.index')->with('success', __('notification.delete.success', ['model' => 'user']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.user.index')->with('danger', __('notification.permission.fail', ['action' => 'delete user']));
        }
    }
}
