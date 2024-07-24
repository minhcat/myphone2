<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Repositories\CityRepository;
use Modules\City\Repositories\DistrictRepository;
use Modules\City\Repositories\WardRepository;
use Modules\User\Repositories\AddressRepository;

class AddressController extends Controller
{
    /** @var \Modules\User\Repositories\AddressRepository */
    protected $addressRepository;

    /** @var \Modules\City\Repositories\CityRepository */
    protected $cityRepository;

    /** @var \Modules\City\Repositories\DistrictRepository */
    protected $districtRepository;

    /** @var \Modules\City\Repositories\WardRepository */
    protected $wardRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->addressRepository = new AddressRepository();
        $this->cityRepository = new CityRepository();
        $this->districtRepository = new DistrictRepository();
        $this->wardRepository =  new WardRepository();

        view()->share('menu', ['group' => 'user', 'active' => 'user']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $user_id)
    {
        $search = $request->input('search');
        $addresses = $this->addressRepository->paginateByUserId($user_id, $search);

        return view('user::address.index', compact('addresses', 'user_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($user_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.user.address.store', $user_id),
            'method'    => 'POST'
        ];
        $cities = $this->cityRepository->all();
        $districts = $this->districtRepository->all();
        $wards = $this->wardRepository->all();

        return view('user::address.create', compact('form', 'user_id', 'cities', 'districts', 'wards'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $user_id)
    {
        $request->validate([
            'content'   => 'required',
            'ward_id'   => 'required|numeric',
        ]);

        $this->addressRepository->create($request->all(), ['author_id' => $user_id]);

        return redirect()->route('admin.user.address.index', $user_id)->with('success', __('notification.create.success', ['model' => 'address']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($user_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.user.address.update', ['user_id' => $user_id, 'id' => $id]),
            'method'    => 'PUT'
        ];
        $cities = $this->cityRepository->all();
        $districts = $this->districtRepository->all();
        $wards = $this->wardRepository->all();
        $address = $this->addressRepository->find($id);

        return view('user::address.create', compact('form', 'address', 'user_id', 'cities', 'districts', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $user_id, $id)
    {
        $request->validate([
            'content'   => 'required',
            'ward_id'   => 'required|numeric',
        ]);

        $this->addressRepository->update($id, $request->all());

        return redirect()->route('admin.user.address.index', $user_id)->with('success', __('notification.update.success', ['model' => 'address']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
