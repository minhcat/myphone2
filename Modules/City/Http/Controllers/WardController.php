<?php

namespace Modules\City\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Repositories\WardRepository;

class WardController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\City\Repositories\WardRepository */
    protected $wardRepository;

    /**
     * Create a new ward controller instance.
     */
    public function __construct()
    {
        $this->wardRepository = new WardRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'city']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $city_id, $district_id)
    {
        try {
            $this->authorize('ward:browse');

            $search = $request->input('search');
            $wards = $this->wardRepository->paginateByDistrictId($district_id, $search);
    
            return view('city::ward.index', compact('wards', 'city_id', 'district_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.index', $city_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'browse district']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($city_id, $district_id)
    {
        try {
            $this->authorize('ward:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.city.district.ward.store', ['city_id' => $city_id, 'district_id' => $district_id]),
                'method'    => 'POST'
            ];
    
            return view('city::ward.create', compact('form', 'city_id', 'district_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('danger', __('notification.permission.fail', ['action' => 'add district']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $city_id, $district_id)
    {
        try {
            $this->authorize('ward:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->wardRepository->create($request->all(), ['district_id' => $district_id]);
    
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('success', __('notification.create.success', ['model' => 'ward']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('danger', __('notification.permission.fail', ['action' => 'add district']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($city_id, $district_id, $id)
    {
        try {
            $this->authorize('ward:read');

            $ward = $this->wardRepository->find($id);
    
            return view('city::ward.show', compact('city_id', 'district_id', 'ward'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('danger', __('notification.permission.fail', ['action' => 'read district']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($city_id, $district_id, $id)
    {
        try {
            $this->authorize('ward:edit');

            $form = [
                'title'     => 'Update',
                'url'       => route('admin.city.district.ward.update', ['city_id' => $city_id, 'district_id' => $district_id, 'id' => $id]),
                'method'    => 'PUT'
            ];
    
            $ward = $this->wardRepository->find($id);
    
            return view('city::ward.edit', compact('form', 'ward', 'city_id', 'district_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('danger', __('notification.permission.fail', ['action' => 'edit district']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $city_id, $district_id, $id)
    {
        try {
            $this->authorize('ward:edit');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->wardRepository->update($id, $request->all());
    
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('success', __('notification.update.success', ['model' => 'ward']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('danger', __('notification.permission.fail', ['action' => 'edit district']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($city_id, $district_id, $id)
    {
        try {
            $this->authorize('ward:delete');

            $this->wardRepository->delete($id);
    
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('success', __('notification.delete.success', ['model' => 'ward']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.city.district.ward.index', ['city_id' => $city_id, 'district_id' => $district_id])
            ->with('danger', __('notification.permission.fail', ['action' => 'delete district']));
        }
    }
}
