<?php

namespace Modules\Attribute\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Repositories\OptionRepository;

class OptionController extends Controller
{
    /** @var \Modules\Attribute\Repositories\OptionRepository */
    protected $optionRepository;

    /**
     * Create a new Attribute controller instance.
     */
    public function __construct()
    {
        $this->optionRepository = new OptionRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $attributeId)
    {
        $search = $request->input('search');
        $options = $this->optionRepository->paginateByAttributeId($attributeId, AbstractRepository::TAKE_DEFAULT, $search);

        return view('attribute::options.index', compact('options', 'attributeId'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($attribute_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('attribute.option.store', $attribute_id),
            'method'    => 'POST',
        ];

        return view('attribute::options.create', compact('form', 'attribute_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $attribute_id)
    {
        $request->validate([
            'value' => 'required|unique:options'
        ]);

        $this->optionRepository->create($request->all(), ['attribute_id' => $attribute_id]);

        return redirect()->route('attribute.option.index', $attribute_id)->with('success', 'create new option successfully');
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
    public function edit($attribute_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('attribute.option.update', ['attribute_id' => $attribute_id, 'id' => $id]),
            'method'    => 'PUT',
        ];

        $option = $this->optionRepository->find($id);

        return view('attribute::options.edit', compact('form', 'option', 'attribute_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $attribute_id, $id)
    {
        $request->validate([
            'value' => 'required|unique:options,value,'.$id
        ]);

        $this->optionRepository->update($id, $request->all(), ['attribute_id' => $attribute_id]);

        return redirect()->route('attribute.option.index', $attribute_id)->with('success', 'update option successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($attribute_id, $id)
    {
        $this->optionRepository->delete($id);

        return redirect()->route('attribute.option.index', $attribute_id)->with('success', 'delete option successfully');
    }
}
