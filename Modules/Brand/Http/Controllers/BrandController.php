<?php

namespace Modules\Brand\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Repositories\BrandRepository;

class BrandController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Brand\Repositories\BrandRepository */
    protected $brandRepository;

    /**
     * Create new brand controller instance.
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
        try {
            $this->authorize('brand:browse');

            $search = $request->input('search');
            $brands = $this->brandRepository->paginate($search);
    
            return view('brand::index', compact('brands'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse brand']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('brand:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.brand.store'),
                'method'    => 'POST',
            ];
    
            return view('brand::create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.brand.index')->with('danger', __('notification.permission.fail', ['action' => 'add brand']));
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
            $this->authorize('brand:add');

            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->brandRepository->create($request->all());
    
            return redirect()->route('admin.brand.index')->with('success', __('notification.create.success', ['model' => 'brand']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.brand.index')->with('danger', __('notification.permission.fail', ['action' => 'add brand']));
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
            $this->authorize('brand:read');

            $brand = $this->brandRepository->find($id);
    
            return view('brand::show', compact('brand'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.brand.index')->with('danger', __('notification.permission.fail', ['action' => 'read brand']));
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
            $this->authorize('brand:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.brand.update', $id),
                'method'    => 'PUT',
            ];
    
            $brand = $this->brandRepository->find($id);
    
            return view('brand::edit', compact('form', 'brand'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.brand.index')->with('danger', __('notification.permission.fail', ['action' => 'edit brand']));
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
            $this->authorize('brand:edit');

            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->brandRepository->update($id, $request->all());
    
            return redirect()->route('admin.brand.index')->with('success', __('notification.update.success', ['model' => 'brand']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.brand.index')->with('danger', __('notification.permission.fail', ['action' => 'edit brand']));
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
            $this->authorize('brand:delete');

            $this->brandRepository->delete($id);
    
            return redirect()->route('admin.brand.index')->with('success', __('notification.delete.success', ['model' => 'brand']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.brand.index')->with('danger', __('notification.permission.fail', ['action' => 'delete brand']));
        }
    }
}
