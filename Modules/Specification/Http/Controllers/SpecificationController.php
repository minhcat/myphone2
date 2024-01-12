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
     * Create a new Specification controller instance.
     */
    public function __construct()
    {
        $this->specificationRepository = new SpecificationRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $specifications = $this->specificationRepository->paginate($search);
        $menu = ['group' => 'product', 'active' => 'specification'];

        return view('specification::specifications.index', compact('specifications', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'url'       => route('specification.store'),
            'method'    => 'POST',
            'title'     => 'Create'
        ];
        $menu = [
            'group' => 'product',
            'active' => 'specification'
        ];

        return view('specification::specifications.create', compact('form', 'menu'));
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

        return redirect()->route('specification.index')->with('success', 'Create new Specification succcessfully.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $specification = $this->specificationRepository->find($id);
        $menu = ['group' => 'product', 'active' => 'specification'];

        return view('specification::specifications.detail', compact('specification', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'url'       => route('specification.update', $id),
            'method'    => 'PUT',
            'title'     => 'Update'
        ];
        $menu = [
            'group' => 'product',
            'active' => 'specification'
        ];

        $specification = $this->specificationRepository->find($id);

        return view('specification::specifications.edit', compact('form', 'specification', 'menu'));
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
            'name'      => 'required:unique:specifications.name.'.$id,
        ]);

        $this->specificationRepository->update($id, $request->all());

        return redirect()->route('specification.index')->with('success', 'Update specification successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->specificationRepository->delete($id);

        return redirect()->route('specification.index')->with('success', 'Delete specification successfully.');
    }
}