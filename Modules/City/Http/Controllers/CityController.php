<?php

namespace Modules\City\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Repositories\CityRepository;

class CityController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\City\Repositories\CityRepository */
    protected $cityRepository;

    /**
     * Create a new city controller instance.
     */
    public function __construct()
    {
        $this->cityRepository = new CityRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'city']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('city:browse');

            $search = $request->input('search');
            $cities = $this->cityRepository->paginate($search);
    
            return view('city::city.index', compact('cities'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse city']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('city:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.city.store'),
                'method'    => 'POST'
            ];
    
            return view('city::city.create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.city.index')->with('danger', __('notification.permission.fail', ['action' => 'add city']));
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
            $this->authorize('city:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->cityRepository->create($request->all());
    
            return redirect()->route('admin.city.index')->with('success', __('notification.create.success', ['model' => 'city']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.city.index')->with('danger', __('notification.permission.fail', ['action' => 'add city']));
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
            $this->authorize('city:read');

            $city = $this->cityRepository->find($id);
    
            return view('city::city.show', compact('city'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.city.index')->with('danger', __('notification.permission.fail', ['action' => 'read city']));
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
            $this->authorize('city:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.city.update', $id),
                'method'    => 'PUT'
            ];
    
            $city = $this->cityRepository->find($id);
    
            return view('city::city.edit', compact('form', 'city'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.city.index')->with('danger', __('notification.permission.fail', ['action' => 'edit city']));
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
            $this->authorize('city:edit');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->cityRepository->update($id, $request->all());
    
            return redirect()->route('admin.city.index')->with('success', __('notification.update.success', ['model' => 'city']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.city.index')->with('danger', __('notification.permission.fail', ['action' => 'edit city']));
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
            $this->authorize('city:delete');

            $this->cityRepository->delete($id);
    
            return redirect()->route('admin.city.index')->with('success', __('notification.delete.success', ['model' => 'city']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.city.index')->with('danger', __('notification.permission.fail', ['action' => 'delete city']));
        }
    }
}
