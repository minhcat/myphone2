<?php

namespace Modules\Condition\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Condition\Repositories\ConditionTargetRepository;

class ConditionTargetController extends Controller
{
    /** @var \Modules\Condition\Repositories\ConditionTargetRepository */
    protected $conditionTargetRepository;

    /**
     * Create new Condition Controller instance.
     */
    public function __construct()
    {
        $this->conditionTargetRepository = new ConditionTargetRepository;

        view()->share('menu', ['group' => 'promotion', 'active' => 'condition']);
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($condition_id, Request $request)
    {
        $search = $request->input('search');
        $targets = $this->conditionTargetRepository->paginateByConditionId($condition_id, $search);

        return view('condition::target.index', compact('condition_id', 'targets'));
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
