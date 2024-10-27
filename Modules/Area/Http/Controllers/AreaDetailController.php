<?php

namespace Modules\Area\Http\Controllers;

use App\Enums\TerritoryType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Area\Repositories\AreaDetailRepository;
use Modules\City\Repositories\CityRepository;
use Modules\City\Repositories\DistrictRepository;
use Modules\City\Repositories\WardRepository;

class AreaDetailController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Area\Repositories\AreaDetailRepository */
    protected $areaDetailRepository;

    /** @var \Modules\City\Repositories\CityRepository */
    protected $cityRepository;

    /** @var \Modules\City\Repositories\DistrictRepository */
    protected $districtRepository;

    /** @var \Modules\City\Repositories\WardRepository */
    protected $wardRepository;

    /**
     * Create new area detail controller instance.
     */
    public function __construct()
    {
        $this->areaDetailRepository = new AreaDetailRepository;
        $this->cityRepository = new CityRepository;
        $this->districtRepository = new DistrictRepository;
        $this->wardRepository = new WardRepository;

        view()->share('menu', ['group' => 'transport', 'active' => 'area']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $area_id)
    {
        try {
            $this->authorize('area_detail:browse');

            $search = $request->input('search');
            $area_details = $this->areaDetailRepository->paginateByAreaId($area_id, $search);

            return view('area::detail.index', compact('area_details', 'area_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.area.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse area detail']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($area_id)
    {
        try {
            $this->authorize('area_detail:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.area.detail.store', $area_id),
                'method'    => 'POST'
            ];
    
            [$territory_types, $cities, $districts, $wards] = $this->getDataForm();
    
            return view('area::detail.create', compact(
                'form',
                'area_id',
                'territory_types',
                'cities',
                'districts',
                'wards',
            ));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add area detail']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $area_id)
    {
        try {
            $this->authorize('area_detail:add');

            $request->validate([
                'territory_type'    => 'required',
                'city_id'           => Rule::requiredIf($request->input('territory_type') == TerritoryType::CITY),
                'district_id'       => Rule::requiredIf($request->input('territory_type') == TerritoryType::DISTRICT),
                'ward_id'           => Rule::requiredIf($request->input('territory_type') == TerritoryType::WARD),
            ]);
    
            $this->areaDetailRepository->create($request->all(), ['area_id' => $area_id]);
    
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('success', __('notification.create.success', ['model' => 'area detail']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add area detail']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($area_id, $id)
    {
        try {
            $this->authorize('area_detail:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.area.detail.update', ['area_id' => $area_id, 'id' => $id]),
                'method'    => 'PUT'
            ];
    
            $area_detail = $this->areaDetailRepository->find($id);
            [$territory_types, $cities, $districts, $wards] = $this->getDataForm();
    
            return view('area::detail.edit', compact(
                'form',
                'area_id',
                'area_detail',
                'territory_types',
                'cities',
                'districts',
                'wards',
            ));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit area detail']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $area_id, $id)
    {
        try {
            $this->authorize('area_detail:edit');

            $request->validate([
                'territory_type'    => 'required',
                'city_id'           => Rule::requiredIf($request->input('territory_type') == TerritoryType::CITY),
                'district_id'       => Rule::requiredIf($request->input('territory_type') == TerritoryType::DISTRICT),
                'ward_id'           => Rule::requiredIf($request->input('territory_type') == TerritoryType::WARD),
            ]);
    
            $this->areaDetailRepository->update($id, $request->all());
    
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('success', __('notification.update.success', ['model' => 'area detail']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit area detail']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($area_id, $id)
    {
        try {
            $this->authorize('area_detail:delete');

            $this->areaDetailRepository->delete($id);
    
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('success', __('notification.delete.success', ['model' => 'area detail']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.area.detail.index', $area_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete area detail']));
        }
    }

    private function getDataForm()
    {
        $territory_types = TerritoryType::getObject();
        $cities = $this->cityRepository->all();
        $districts = $this->districtRepository->all();
        $wards = $this->wardRepository->all();

        return [
            $territory_types,
            $cities,
            $districts,
            $wards,
        ];
    }
}
