<?php

namespace Modules\Condition\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Condition\Repositories\ConditionRepository;

class ConditionController extends Controller
{
    /** @var \Modules\Condition\Repositories\ConditionRepository */
    protected $conditionRepository;

    /**
     * Create new Condition Controller instance.
     */
    public function __construct()
    {
        $this->conditionRepository = new ConditionRepository;

        view()->share('menu', ['group' => 'promotion', 'active' => 'condition']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $conditions = $this->conditionRepository->paginate($search);

        return view('condition::index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('condition.store'),
            'method'    => 'POST',
        ];

        return view('condition::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:conditions'
        ]);

        $this->conditionRepository->create($request->all());

        return redirect()->route('condition.index')->with('success', 'Create new condition successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $condition = $this->conditionRepository->find($id);

        return view('condition::detail', compact('condition'));
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
            'url'       => route('condition.update', $id),
            'method'    => 'PUT',
        ];

        $condition = $this->conditionRepository->find($id);

        return view('condition::edit', compact('form', 'condition'));
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
            'name'  => 'unique:categories,name,'.$id
        ]);

        $this->conditionRepository->update($id, $request->all());

        return redirect()->route('condition.index')->with('success', 'Update condition successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->conditionRepository->delete($id);

        return redirect()->route('condition.index')->with('success', 'Delete condition successfully');
    }
}
