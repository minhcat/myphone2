<?php

namespace Modules\Brand\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Repositories\BrandRepository;

class BrandController extends Controller
{
    /** @var \App\Repositories\AbstractRepository */
    protected $brandRepository;

    /**
     * Create new Brand Controller instance.
     */
    public function __construct()
    {
        $this->brandRepository = new BrandRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $brands = $this->brandRepository->paginate(AbstractRepository::TAKE_DEFAULT, $search);

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
            'url'       => route('brand.store'),
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

        return redirect()->route('brand.index')->with('success', 'create new brand successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $brand = $this->brandRepository->find($id);

        return view('brand::detail', compact('brand'));
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
            'url'       => route('brand.update', $id),
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

        return redirect()->route('brand.index')->with('success', 'update brand successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->brandRepository->delete($id);

        return redirect()->route('brand.index')->with('success', 'delete brand successfully');
    }
}
