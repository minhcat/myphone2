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
    protected $productRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->productRepository = new ProductRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $products = $this->productRepository->paginate(AbstractRepository::TAKE_DEFAULT, $search);

        return view('product::index', compact('products'));
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
        $this->productRepository->create($request->all());

        return redirect()->route('product.index')->with('success', 'create new product successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

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

        $product = $this->productRepository->find($id);

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
        $this->productRepository->update($id, $request->all());

        return redirect()->route('product.index')->with('success', 'update product successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->productRepository->delete($id);

        return redirect()->route('product.index')->with('success', 'delete product successfully');
    }
}
