<?php

namespace Modules\Role\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Role\Repositories\RoleRepository;

class RoleController extends Controller
{
    /** @var \Modules\Role\Repositories\RoleRepository */
    protected $roleRepository;

    /**
     * Create a new promotion controller instance.
     */
    public function __construct()
    {
        $this->roleRepository = new RoleRepository();

        view()->share('menu', ['group' => 'user', 'active' => 'role']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $roles = $this->roleRepository->paginate($search);

        return view('role::index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.role.store'),
            'method'    => 'POST'
        ];

        return view('role::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required'
        ]);

        $this->roleRepository->create($request->all());

        return redirect()->route('admin.role.index')->with('success', __('notification.create.success', ['model' => 'role']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $role = $this->roleRepository->find($id);

        return view('role::show', compact('role'));
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
            'url'       => route('admin.role.update', $id),
            'method'    => 'PUT'
        ];

        $role = $this->roleRepository->find($id);

        return view('role::edit', compact('form', 'role'));
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
            'name'      => 'required'
        ]);

        $this->roleRepository->update($id, $request->all());

        return redirect()->route('admin.role.index')->with('success', __('notification.update.success', ['model' => 'role']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->roleRepository->delete($id);

        return redirect()->route('admin.role.index')->with('success', __('notification.delete.success', ['model' => 'role']));
    }
}
