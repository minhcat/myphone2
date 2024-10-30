<?php

namespace Modules\City\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Repositories\DistrictRepository;

class DistrictController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\City\Repositories\DistrictRepository */
    protected $districtRepository;

    /**
     * Create a new district controller instance.
     */
    public function __construct()
    {
        $this->districtRepository = new DistrictRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'city']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $city_id)
    {
        try {
            $this->authorize('district:browse');

            $search = $request->input('search');
            $districts = $this->districtRepository->paginateByCityId($city_id, $search);
    
            return view('city::district.index', compact('city_id', 'districts'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse district']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($city_id)
    {
        try {
            $this->authorize('district:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.city.district.store', $city_id),
                'method'    => 'POST'
            ];
    
            return view('city::district.create', compact('form', 'city_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add district']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $city_id)
    {
        try {
            $this->authorize('district:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->districtRepository->create($request->all(), ['city_id' => $city_id]);
    
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('success', __('notification.create.success', ['model' => 'district']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add district']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($city_id, $id)
    {
        try {
            $this->authorize('district:read');

            $district = $this->districtRepository->find($id);
    
            return view('city::district.show', compact('district', 'city_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'read district']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($city_id, $id)
    {
        try {
            $this->authorize('district:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.city.district.update', ['city_id' => $city_id, 'id' => $id]),
                'method'    => 'PUT'
            ];
    
            $district = $this->districtRepository->find($id);
    
            return view('city::district.edit', compact('form', 'district', 'city_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit district']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $city_id, $id)
    {
        try {
            $this->authorize('district:edit');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->districtRepository->update($id, $request->all());
    
            return redirect()->route('admin.city.district.index', $city_id)->with('success', __('notification.update.success', ['model' => 'district']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit district']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($city_id, $id)
    {
        try {
            $this->authorize('district:delete');

            $this->districtRepository->delete($id);
    
            return redirect()->route('admin.city.district.index', $city_id)->with('success', __('notification.delete.success', ['model' => 'district']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete district']));
        }
    }
}
