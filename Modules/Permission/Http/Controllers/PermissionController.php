<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Repositories\PermissionRepository;

class PermissionController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Permission\Repositories\PermissionRepository */
    protected $permissionRepository;

    /**
     * Create new category Controller instance.
     */
    public function __construct()
    {
        $this->permissionRepository = new PermissionRepository;

        view()->share('menu', ['group' => 'user', 'active' => 'permission']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('permission:browse');

            $search = $request->input('search');
            $permissions = $this->permissionRepository->paginate($search);

            return view('permission::index', compact('permissions'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse permission']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('permission:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.permission.store'),
                'method'    => 'POST'
            ];

            return view('permission::create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.permission.index')->with('danger', __('notification.permission.fail', ['action' => 'add permission']));
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
            $this->authorize('permission:add');

            $request->validate([
                'name'  => 'required',
                'key'   => 'required|unique:permissions'
            ]);

            $this->permissionRepository->create($request->all());

            return redirect()->route('admin.permission.index')->with('success', __('notification.create.success', ['model' => 'permission']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.permission.index')->with('danger', __('notification.permission.fail', ['action' => 'add permission']));
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
            $this->authorize('permission:read');

            $permission = $this->permissionRepository->find($id);

            return view('permission::show', compact('permission'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.permission.index')->with('danger', __('notification.permission.fail', ['action' => 'read permission']));
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
            $this->authorize('permission:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.permission.update', $id),
                'method'    => 'PUT'
            ];

            $permission = $this->permissionRepository->find($id);

            return view('permission::edit', compact('form', 'permission'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.permission.index')->with('danger', __('notification.permission.fail', ['action' => 'edit permission']));
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
            $this->authorize('permission:edit');

            $request->validate([
                'name'  => 'required',
                'key'   => 'required|unique:permissions,key,'.$id
            ]);

            $this->permissionRepository->update($id, $request->all());

            return redirect()->route('admin.permission.index')->with('success', __('notification.update.success', ['model' => 'permission']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.permission.index')->with('danger', __('notification.permission.fail', ['action' => 'edit permission']));
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
            $this->authorize('permission:delete');

            $this->permissionRepository->delete($id);

            return redirect()->route('admin.permission.index')->with('success', __('notification.delete.success', ['model' => 'permission']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.permission.index')->with('danger', __('notification.permission.fail', ['action' => 'delete permission']));
        }
    }
}
