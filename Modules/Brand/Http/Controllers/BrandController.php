<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Repositories\BrandRepository;

class BrandController extends Controller
{
    /** @var \App\Repositories\AbstractRepository */ // todo: change comment
    protected $brandRepository;

    /**
     * Create new Brand Controller instance.
     */
    public function __construct()
    {
        $this->brandRepository = new BrandRepository;

        view()->share('menu', ['group' => 'product', 'active' => 'brand']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brands = $this->brandRepository->paginate($search);

        return view('brand::index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.brand.store'),
            'method'    => 'POST',
        ];

        return view('brand::create', compact('form'));
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
        ]);

        $this->brandRepository->create($request->all());

        return redirect()->route('admin.brand.index')->with('success', __('notification.create.success', ['model' => 'brand']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $brand = $this->brandRepository->find($id);

        return view('brand::show', compact('brand'));
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
            'url'       => route('admin.brand.update', $id),
            'method'    => 'PUT',
        ];

        $brand = $this->brandRepository->find($id);

        return view('brand::edit', compact('form', 'brand'));
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
        ]);

        $this->brandRepository->update($id, $request->all());

        return redirect()->route('admin.brand.index')->with('success', __('notification.update.success', ['model' => 'brand']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->brandRepository->delete($id);

        return redirect()->route('admin.brand.index')->with('success', __('notification.delete.success', ['model' => 'brand']));
    }
}
