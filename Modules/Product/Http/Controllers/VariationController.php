<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;
use Modules\Attribute\Repositories\AttributeRepository;

class VariationController extends Controller
{
    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variationRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Attribute\Repositories\AttributeRepository */
    protected $attributeRepository;

    /**
     * Create a new Variation controller instance.
     */
    public function __construct()
    {
        $this->variationRepository = new VariationRepository();
        $this->productRepository = new ProductRepository();
        $this->attributeRepository = new AttributeRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($product_id)
    {
        $variations = $this->variationRepository->paginateByProductId($product_id);
        $product = $this->productRepository->find($product_id);
        $product_name = $product->name ?: '';
        $attributes = $this->attributeRepository->all();
        $menu = ['group' => 'product', 'active' => 'product'];

        return view('product::variations.index', compact('variations', 'attributes', 'product_id', 'product_name', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request, $product_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('product.variation.store', $product_id),
            'method'    => 'POST'
        ];
        $menu = [
            'group' => 'product',
            'active' => 'product'
        ];

        $attributes = $this->attributeRepository->all();


        return view('product::variations.create', compact('form', 'product_id', 'attributes', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $product_id)
    {
        $request->validate([
            'code'      => 'required|unique:variations',
            'price'     => 'required|numeric'
        ]);

        $this->variationRepository->create($request->all());

        return redirect()->route('product.variation.index', $product_id)->with('success', 'create new variation successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($product_id, $id)
    {
        $variation = $this->variationRepository->find($id);

        $attributes = $this->attributeRepository->all();

        $menu = ['group' => 'product', 'active' => 'product'];

        return view('product::variations.detail', compact('variation', 'attributes', 'product_id', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($product_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('product.variation.update', ['product_id' => $product_id, 'id' => $id]),
            'method'    => 'PUT'
        ];
        $menu = [
            'group' => 'product',
            'active' => 'product'
        ];
        $variation = $this->variationRepository->find($id);
        $attributes = $this->attributeRepository->all();

        return view('product::variations.edit', compact('form', 'variation', 'attributes', 'product_id', 'menu'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $product_id, $id)
    {
        $request->validate([
            'code'      => 'required|unique:variations,code,'.$id,
            'price'     => 'required|numeric'
        ]);

        $this->variationRepository->update($id, $request->all());

        return redirect()->route('product.variation.index', $product_id)->with('success', 'create new variation successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($product_id, $id)
    {
        $this->variationRepository->delete($id);

        return redirect()->route('product.variation.index', $product_id)->with('success', 'delete variation successfully');
    }
}
