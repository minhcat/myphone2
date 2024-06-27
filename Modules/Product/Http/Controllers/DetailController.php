<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\DetailRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Specification\Repositories\SpecificationRepository;

class DetailController extends Controller
{
    /** @var \Modules\Product\Repositories\DetailRepository */
    protected $detailRepository;

    /** @var \Modules\Specification\Repositories\SpecificationRepository */
    protected $specificationRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /**
     * Create a new Detail controller instance.
     */
    public function __construct()
    {
        $this->detailRepository = new DetailRepository();
        $this->specificationRepository = new SpecificationRepository();
        $this->productRepository = new ProductRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'product']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($product_id)
    {
        $specifications = $this->specificationRepository->all();
        $details = $this->detailRepository->findByProductId($product_id);

        return view('product::detail.index', compact('specifications', 'details', 'product_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($product_id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.product.detail.update', $product_id),
            'method'    => 'POST',
        ];
        $product_name = optional($this->productRepository->find($product_id))->name;
        $details = $this->detailRepository->findByProductId($product_id);
        $specifications = $this->specificationRepository->all();

        return view('product::detail.edit', compact('details', 'specifications', 'product_name', 'form'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $product_id)
    {
        $this->detailRepository->updateWithProductId($product_id, $request->all());

        return redirect()->route('admin.product.detail.index', $product_id)->with('success', __('notification.update.success', ['model' => 'product detail']));
    }
}
