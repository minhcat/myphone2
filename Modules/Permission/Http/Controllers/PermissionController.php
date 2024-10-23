<?php

namespace Modules\Permission\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\Repositories\PermissionRepository;

class PermissionController extends Controller
{
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
        $search = $request->input('search');
        $permissions = $this->permissionRepository->paginate($search);

        return view('permission::index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.permission.store'),
            'method'    => 'POST'
        ];

        return view('permission::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'key'   => 'required|unique:permissions'
        ]);

        $this->permissionRepository->create($request->all());

        return redirect()->route('admin.permission.index')->with('success', __('notification.create.success', ['model' => 'permission']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $permission = $this->permissionRepository->find($id);

        return view('permission::show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.permission.update', $id),
            'method'    => 'PUT'
        ];

        $permission = $this->permissionRepository->find($id);

        return view('permission::edit', compact('form', 'permission'));
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
            'name'  => 'required',
            'key'   => 'required|unique:permissions,key,'.$id
        ]);

        $this->permissionRepository->update($id, $request->all());

        return redirect()->route('admin.permission.index')->with('success', __('notification.update.success', ['model' => 'permission']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->permissionRepository->delete($id);

        return redirect()->route('admin.permission.index')->with('success', __('notification.delete.success', ['model' => 'permission']));
    }
}
