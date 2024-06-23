<?php

namespace Modules\Sale\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sale\Repositories\SaleProductRepository;

class SaleProductController extends Controller
{
    /** @var \Modules\Sale\Repositories\SaleProductRepository */
    protected $saleProductRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->saleProductRepository = new SaleProductRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'sale']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $sale_id)
    {
        $search = $request->input('search');
        $sale_products = $this->saleProductRepository->paginateBySaleId($sale_id, $search);

        return view('sale::product.index', compact('sale_products', 'sale_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('sale::create');
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
        return view('sale::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('sale::edit');
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
