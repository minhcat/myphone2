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
        return view('condition::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('condition::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('condition::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
