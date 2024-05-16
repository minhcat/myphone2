<?php

namespace Modules\Attribute\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Repositories\AttributeRepository;
use Modules\Attribute\Repositories\OptionRepository;

class AttributeController extends Controller
{
    /** @var \Modules\Attribute\Repositories\AttributeRepository */
    protected $attributeRepository;

    /** @var \Modules\Attribute\Repositories\OptionRepository */
    protected $optionRepository;

    /**
     * Create a new Attribute controller instance.
     */
    public function __construct()
    {
        $this->attributeRepository = new AttributeRepository();
        $this->optionRepository = new OptionRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'attribute']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $attributes = $this->attributeRepository->paginate($search);

        return view('attribute::attribute.index', compact('attributes'));
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

        return view('attribute::attribute.create', compact('form'));
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
        $attribute = $this->attributeRepository->find($id);

        return view('attribute::attribute.detail', compact('attribute'));
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

        return view('attribute::attribute.edit', compact('form', 'attribute'));
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
        $this->attributeRepository->delete($id);

        $this->optionRepository->deleteByAttributeId($id);

        return redirect()->route('attribute.index')->with('success', 'delete attribute successfully');
    }
}
