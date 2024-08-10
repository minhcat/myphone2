<?php

namespace Modules\Specification\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Specification\Repositories\SpecificationRepository;

class SpecificationController extends Controller
{
    /** @var \Modules\Specification\Repositories\SpecificationRepository */
    protected $specificationRepository;

    /**
     * Create a new specification controller instance.
     */
    public function __construct()
    {
        $this->specificationRepository = new SpecificationRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'specification']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $specifications = $this->specificationRepository->paginate($search);

        return view('specification::specification.index', compact('specifications'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'url'       => route('admin.specification.store'),
            'method'    => 'POST',
            'title'     => 'Create'
        ];

        return view('specification::specification.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:specifications'
        ]);

        $this->specificationRepository->create($request->all());

        return redirect()->route('admin.specification.index')->with('success', __('notification.create.success', ['model' => 'specification']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $specification = $this->specificationRepository->find($id);

        return view('specification::specification.show', compact('specification'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'url'       => route('admin.specification.update', $id),
            'method'    => 'PUT',
            'title'     => 'Update'
        ];

        $specification = $this->specificationRepository->find($id);

        return view('specification::specification.edit', compact('form', 'specification'));
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
            'name'      => 'required|unique:specifications.name.'.$id,
        ]);

        $this->specificationRepository->update($id, $request->all());

        return redirect()->route('admin.specification.index')->with('success', __('notification.update.success', ['model' => 'specification']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->specificationRepository->delete($id);

        return redirect()->route('admin.specification.index')->with('success', __('notification.delete.success', ['model' => 'specification']));
    }
}
