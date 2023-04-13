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
        $form = [
            'title'     => 'Create',
            'url'       => route('product.store'),
            'method'    => 'POST',
        ];

        return view('product::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('product.index')->with('success', 'create new product successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $product = $this->repository->find($id);

        return view('product::detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('product.update', $id),
            'method'    => 'PUT',
        ];

        $product = $this->repository->find($id);

        return view('product::edit', compact('form', 'product'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->repository->update($id, $request->all());

        return redirect()->route('product.index')->with('success', 'update product successfully');
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
