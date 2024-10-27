<?php

namespace Modules\Area\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Area\Repositories\AreaRepository;

class AreaController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Area\Repositories\AreaRepository */
    protected $areaRepository;

    /**
     * Create new area controller instance.
     */
    public function __construct()
    {
        $this->areaRepository = new AreaRepository;

        view()->share('menu', ['group' => 'transport', 'active' => 'area']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('area:browse');

            $search = $request->input('search');
            $areas = $this->areaRepository->paginate($search);
    
            return view('area::area.index', compact('areas'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse area']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('area:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.area.store'),
                'method'    => 'POST'
            ];
    
            return view('area::area.create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.area.index')->with('danger', __('notification.permission.fail', ['action' => 'add area']));
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
            $this->authorize('area:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->areaRepository->create($request->all());
    
            return redirect()->route('admin.area.index')->with('success', __('notification.create.success', ['model' => 'area']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.area.index')->with('danger', __('notification.permission.fail', ['action' => 'add area']));
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
            $this->authorize('area:read');
            $area = $this->areaRepository->find($id);
    
            return view('area::area.show', compact('area'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.area.index')->with('danger', __('notification.permission.fail', ['action' => 'read area']));
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
            $this->authorize('area:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.area.update', $id),
                'method'    => 'PUT'
            ];
    
            $area = $this->areaRepository->find($id);
    
            return view('area::area.edit', compact('form', 'area'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.area.index')->with('danger', __('notification.permission.fail', ['action' => 'edit area']));
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
            $this->authorize('area:edit');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->areaRepository->update($id, $request->all());
    
            return redirect()->route('admin.area.index')->with('success', __('notification.update.success', ['model' => 'area']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.area.index')->with('danger', __('notification.permission.fail', ['action' => 'edit area']));
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
            $this->authorize('area:delete');
            $this->areaRepository->delete($id);
    
            return redirect()->route('admin.area.index')->with('success', __('notification.delete.success', ['model' => 'area']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.area.index')->with('danger', __('notification.permission.fail', ['action' => 'delete area']));
        }
    }
}
