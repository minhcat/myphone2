<?php

namespace Modules\Gift\Http\Controllers;

use App\Enums\TargetType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gift\Repositories\GiftProductItemRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;

class GiftProductItemController extends Controller
{
    /** @var \Modules\Gift\Repositories\GiftProductItemRepository */
    protected $giftProductItemRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variantRepository;

    /**
     * Create a new gift product item controller instance.
     */
    public function __construct()
    {
        $this->giftProductItemRepository = new GiftProductItemRepository();
        $this->productRepository = new ProductRepository();
        $this->variantRepository = new VariationRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'gift']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($gift_id, $gift_product_id)
    {
        $gift_product_items = $this->giftProductItemRepository->paginateByGiftProductId($gift_product_id);

        return view('gift::item.index', compact('gift_product_items', 'gift_id', 'gift_product_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($gift_id, $gift_product_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.gift.product.item.store', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id]),
            'method'    => 'POST',
        ];

        $products = $this->productRepository->all();
        $variants = $this->variantRepository->all();
        $target_types = TargetType::getObject();

        return view('gift::item.create', compact('form', 'gift_id', 'gift_product_id', 'products', 'variants', 'target_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $gift_id, $gift_product_id)
    {
        $request->validate([
            'target_type'   => 'required',
            'target_id'     => 'required',
        ]);

        $this->giftProductItemRepository->create($request->all(), ['gift_product_id' => $gift_product_id]);

        return redirect()
        ->route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id])
        ->with('success', __('notification.create.success', ['model' => 'gift product item']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($gift_id, $gift_product_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.gift.product.item.update', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id, 'id' => $id]),
            'method'    => 'PUT',
        ];

        $products = $this->productRepository->all();
        $variants = $this->variantRepository->all();
        $target_types = TargetType::getObject();
        $gift_product_item = $this->giftProductItemRepository->find($id);

        return view('gift::item.edit', compact('form', 'products', 'variants', 'target_types', 'gift_id', 'gift_product_id', 'gift_product_item'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $gift_id, $gift_product_id, $id)
    {
        $request->validate([
            'target_type'   => 'required',
            'target_id'     => 'required',
        ]);

        $this->giftProductItemRepository->update($id, $request->all());

        return redirect()
        ->route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id])
        ->with('success', __('notification.update.success', ['model' => 'gift product item']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($gift_id, $gift_product_id, $id)
    {
        $this->giftProductItemRepository->delete($id);

        return redirect()
        ->route('admin.gift.product.item.index', ['gift_id' => $gift_id, 'gift_product_id' => $gift_product_id])
        ->with('success', __('notification.delete.success', ['model' => 'gift product item']));
    }
}
