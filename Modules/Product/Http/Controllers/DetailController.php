<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\DetailRepository;
use Modules\Specification\Repositories\SpecificationRepository;

class DetailController extends Controller
{
    /** @var \Modules\Product\Repositories\DetailRepository */
    protected $detailRepository;

    /** @var \Modules\Specification\Repositories\SpecificationRepository */
    protected $specificationRepository;

    /**
     * Create a new Detail controller instance.
     */
    public function __construct()
    {
        $this->detailRepository = new DetailRepository();
        $this->specificationRepository = new SpecificationRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($product_id)
    {
        $specifications = $this->specificationRepository->all();
        $details = $this->detailRepository->findByProductId($product_id);

        return view('product::details.index', compact('specifications', 'details'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::create');
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
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('product::edit');
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
