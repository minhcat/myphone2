<?php

namespace Modules\Specification\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Specification\Repositories\InformationRepository;

class InformationController extends Controller
{
    /** @var \Modules\Specification\Repositories\InformationRepository */
    protected $informationRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->informationRepository = new InformationRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'specification']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $specification_id)
    {
        $search = $request->input('search');
        $informations = $this->informationRepository->paginateBySpecificationId($specification_id, $search);

        return view('specification::information.index', compact('informations', 'specification_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($specification_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('specification.information.store', $specification_id),
            'method'    => 'POST',
        ];

        return view('specification::information.create', compact('form', 'specification_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $specification_id)
    {
        $request->validate([
            'value'     => 'required'
        ]);

        $this->informationRepository->create($request->all(), ['specification_id' => $specification_id]);

        return redirect()->route('specification.information.index', $specification_id)->with('success', 'Create new Information successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($specification_id, $id)
    {
        $information = $this->informationRepository->find($id);

        return view('specification::information.detail', compact('information', 'specification_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($specification_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('specification.information.update', ['specification_id' => $specification_id, 'id' => $id]),
            'method'    => 'PUT',
        ];

        $information = $this->informationRepository->find($id);

        return view('specification::information.edit', compact('form', 'information', 'specification_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $specification_id, $id)
    {
        $request->validate([
            'value'     => 'required',
        ]);

        $this->informationRepository->update($id, $request->all(), ['specification_id' => $specification_id]);

        return redirect()->route('specification.information.index', $specification_id)->with('success', 'Edit Information successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($specification_id, $id)
    {
        $this->informationRepository->delete($id);

        return redirect()->route('specification.information.index', $specification_id)->with('success', 'Delete Information successfully');
    }
}
