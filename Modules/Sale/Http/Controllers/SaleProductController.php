<?php

namespace Modules\Sale\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\TargetType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;
use Modules\Sale\Repositories\SaleProductRepository;

class SaleProductController extends Controller
{
    /** @var \Modules\Sale\Repositories\SaleProductRepository */
    protected $saleProductRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variantRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->saleProductRepository = new SaleProductRepository();
        $this->productRepository = new ProductRepository();
        $this->variantRepository = new VariationRepository();

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
    public function create($sale_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.sale.product.store', $sale_id),
            'method'    => 'POST',
        ];

        $products = $this->productRepository->all();
        $variants = $this->variantRepository->all();
        $target_types = TargetType::getObject();
        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();

        return view('sale::product.create', compact(
            'form',
            'products',
            'variants',
            'target_types',
            'discount_targets',
            'discount_types',
            'sale_id'
        ));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $sale_id)
    {
        $request->validate([
            'target_id'     => 'required',
            'target_type'   => 'required',
        ]);

        $this->saleProductRepository->create($request->all(), ['sale_id' => $sale_id]);

        return redirect()
        ->route('admin.sale.product.index', $sale_id)
        ->with('success', __('notification.create.success', ['model' => 'sale product']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($sale_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.sale.product.update', ['sale_id' => $sale_id, 'id' => $id]),
            'method'    => 'PUT',
        ];

        $products = $this->productRepository->all();
        $variants = $this->variantRepository->all();
        $target_types = TargetType::getObject();
        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();
        $sale_product = $this->saleProductRepository->find($id);

        return view('sale::product.edit', compact(
            'form',
            'products',
            'variants',
            'target_types',
            'discount_targets',
            'discount_types',
            'sale_product',
            'sale_id'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $sale_id, $id)
    {
        $request->validate([
            'target_id'     => 'required',
            'target_type'   => 'required',
        ]);

        $this->saleProductRepository->update($id, $request->all());

        return redirect()
        ->route('admin.sale.product.index', $sale_id)
        ->with('success', __('notification.update.success', ['model' => 'sale product']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($sale_id, $id)
    {
        $this->saleProductRepository->delete($id);

        return redirect()
        ->route('admin.sale.product.index', $sale_id)
        ->with('success', __('notification.delete.success', ['model' => 'sale product']));
    }
}
