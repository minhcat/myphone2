<?php

namespace Modules\City\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\City\Repositories\CityRepository;

class CityController extends Controller
{
    /** @var \Modules\City\Repositories\CityRepository */
    protected $cityRepository;

    /**
     * Create a new Product controller instance.
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
        $search = $request->input('search');
        $cities = $this->cityRepository->paginate($search);

        return view('city::city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.city.store'),
            'method'    => 'POST'
        ];

        return view('city::city.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $this->cityRepository->create($request->all());

        return redirect()->route('admin.city.index')->with('success', __('notification.create.success', ['model' => 'city']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $city = $this->cityRepository->find($id);

        return view('city::city.show', compact('city'));
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
            'url'       => route('admin.city.update', $id),
            'method'    => 'PUT'
        ];

        $city = $this->cityRepository->find($id);

        return view('city::city.edit', compact('form', 'city'));
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
            'name'  => 'required'
        ]);

        $this->cityRepository->update($id, $request->all());

        return redirect()->route('admin.city.index')->with('success', __('notification.update.success', ['model' => 'city']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->cityRepository->delete($id);

        return redirect()->route('admin.city.index')->with('success', __('notification.delete.success', ['model' => 'city']));
    }
}
