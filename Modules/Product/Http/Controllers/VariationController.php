<?php

namespace Modules\Product\Http\Controllers;

use App\Repositories\AbstractRepository;
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
    public function index(Request $request, $product_id)
    {
        $search = $request->input('search');
        $variations = $this->variationRepository->paginateByProductId($product_id, AbstractRepository::TAKE_DEFAULT, $search);
        $product = $this->productRepository->find($product_id);
        $product_name = $product->name ?: '';

        return view('product::variations.index', compact('variations', 'product_id', 'product_name'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request, $product_id)
    {
        $attributes = $this->attributeRepository->all();
        $form = [
            'title'     => 'Create',
            'url'       => route('product.variation.store', $product_id),
            'method'    => 'POST'
        ];

        return view('product::variations.create', compact('form', 'product_id', 'attributes'));
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
