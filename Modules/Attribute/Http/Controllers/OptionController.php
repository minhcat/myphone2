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
    public function create()
    {
        return view('attribute::create');
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
        return view('attribute::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('attribute::edit');
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
