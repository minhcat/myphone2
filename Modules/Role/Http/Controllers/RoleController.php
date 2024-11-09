<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Repositories\PermissionRepository;
use Modules\Role\Repositories\RoleRepository;

class RoleController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Role\Repositories\RoleRepository */
    protected $roleRepository;

    /** @var \Modules\Permission\Repositories\PermissionRepository */
    protected $permissionRepository;

    /**
     * Create a new promotion controller instance.
     */
    public function __construct()
    {
        $this->roleRepository = new RoleRepository();
        $this->permissionRepository = new PermissionRepository();

        view()->share('menu', ['group' => 'user', 'active' => 'role']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('role:browse');

            $search = $request->input('search');
            $roles = $this->roleRepository->paginate($search);
    
            return view('role::index', compact('roles'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse role']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('role:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.role.store'),
                'method'    => 'POST'
            ];
    
            return view('role::create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'add role']));
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
            $this->authorize('role:add');

            $request->validate([
                'name'      => 'required'
            ]);
    
            $this->roleRepository->create($request->all());
    
            return redirect()->route('admin.role.index')->with('success', __('notification.create.success', ['model' => 'role']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'add role']));
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
            $this->authorize('role:read');

            $role = $this->roleRepository->find($id);
    
            return view('role::show', compact('role'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'read role']));
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
            $this->authorize('role:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.role.update', $id),
                'method'    => 'PUT'
            ];
    
            $role = $this->roleRepository->find($id);
    
            return view('role::edit', compact('form', 'role'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'edit role']));
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
            $this->authorize('role:edit');

            $request->validate([
                'name'      => 'required'
            ]);
    
            $this->roleRepository->update($id, $request->all());
    
            return redirect()->route('admin.role.index')->with('success', __('notification.update.success', ['model' => 'role']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'edit role']));
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
            $this->authorize('role:delete');

            $this->roleRepository->delete($id);
    
            return redirect()->route('admin.role.index')->with('success', __('notification.delete.success', ['model' => 'role']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'delete role']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function editPermission($id)
    {
        try {
            $this->authorize('role:edit');

            $role = $this->roleRepository->find($id);
            $permission_groups = $this->permissionRepository->all()->groupBy('table');
    
            return view('role::permission', compact('role', 'permission_groups'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'edit role']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updatePermission(Request $request, $id)
    {
        try {
            $this->authorize('role:edit');

            $this->roleRepository->updatePermission($id, $request->input('permission'));
    
            return redirect()->route('admin.role.edit_permission', $id)->with('success', __('notification.update.success', ['model' => 'role']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.role.index')->with('danger', __('notification.permission.fail', ['action' => 'edit role']));
        }
    }
}
