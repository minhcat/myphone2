<?php

namespace Modules\Product\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;

class ProductController extends Controller
{
    /** @var \App\Repositories\AbstractRepository */
    protected $repository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $take     = $request->input('take') ?? AbstractRepository::TAKE_DEFAULT;
        $page     = $request->input('page') ?? AbstractRepository::PAGE_DEFAULT;
        $products = $this->repository->paginate($take, $search);
        $total    = $products->total();
        $start    = ($page - 1) * $take + 1;
        $end      = min($page * $take, $products->total());

        return view('product::index', compact('products', 'total', 'take', 'page', 'start', 'end'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::form');
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
        return view('product::detail');
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
