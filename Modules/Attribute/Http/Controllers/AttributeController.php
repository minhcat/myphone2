<?php

namespace Modules\Attribute\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Repositories\AttributeRepository;

class AttributeController extends Controller
{
    /** @var \App\Repositories\AbstractRepository */
    protected $attributeRepository;

    /**
     * Create a new Attribute controller instance.
     */
    public function __construct()
    {
        $this->attributeRepository = new AttributeRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $attributes = $this->attributeRepository->paginate(AbstractRepository::TAKE_DEFAULT, $search);

        return view('attribute::index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('attribute.store'),
            'method'    => 'POST',
        ];

        return view('attribute::create', compact('form'));
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

        $this->attributeRepository->create($request->all());

        return redirect()->route('attribute.index')->with('success', 'create new attribute successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('attribute::show');
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
            'url'       => route('attribute.update', $id),
            'method'    => 'PUT',
        ];

        $attribute = $this->attributeRepository->find($id);

        return view('attribute::edit', compact('form', 'attribute'));
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

        $this->attributeRepository->update($id, $request->all());

        return redirect()->route('attribute.index')->with('success', 'update attribute successfully');
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
