<?php

namespace Modules\Gift\Http\Controllers;

use App\Enums\TargetType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gift\Repositories\GiftProductRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;

class GiftProductController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Gift\Repositories\GiftProductRepository */
    protected $giftProductRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variantRepository;

    /**
     * Create a new gift product controller instance.
     */
    public function __construct()
    {
        $this->giftProductRepository = new GiftProductRepository();
        $this->productRepository = new ProductRepository();
        $this->variantRepository = new VariationRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'gift']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $gift_id)
    {
        try {
            $this->authorize('gift_product:browse');

            $search = $request->input('search');
            $gift_products = $this->giftProductRepository->paginateByGiftId($gift_id, $search);
    
            return view('gift::product.index', compact('gift_products', 'gift_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.gift.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse gift product']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($gift_id)
    {
        try {
            $this->authorize('gift_product:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.gift.product.store', $gift_id),
                'method'    => 'POST',
            ];
    
            $products = $this->productRepository->all();
            $variants = $this->variantRepository->all();
            $target_types = TargetType::getObject();
    
            return view('gift::product.create', compact('form', 'products', 'variants', 'target_types', 'gift_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add gift product']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $gift_id)
    {
        try {
            $this->authorize('gift_product:add');

            $request->validate([
                'target_id'     => 'required',
                'target_type'   => 'required',
            ]);
    
            $this->giftProductRepository->create($request->all(), ['gift_id' => $gift_id]);
    
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('success', __('notification.create.success', ['model' => 'gift product']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add gift product']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($gift_id, $id)
    {
        try {
            $this->authorize('gift_product:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.gift.product.update', ['gift_id' => $gift_id, 'id' => $id]),
                'method'    => 'PUT',
            ];
    
            $products = $this->productRepository->all();
            $variants = $this->variantRepository->all();
            $target_types = TargetType::getObject();
            $gift_product = $this->giftProductRepository->find($id);
    
            return view('gift::product.edit', compact('form', 'products', 'variants', 'target_types', 'gift_id', 'gift_product'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit gift product']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $gift_id, $id)
    {
        try {
            $this->authorize('gift_product:edit');

            $request->validate([
                'target_id'     => 'required',
                'target_type'   => 'required',
            ]);
    
            $this->giftProductRepository->update($id, $request->all());
    
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('success', __('notification.update.success', ['model' => 'gift product']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit gift product']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($gift_id, $id)
    {
        try {
            $this->authorize('gift_product:delete');

            $this->giftProductRepository->delete($id);
    
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('success', __('notification.delete.success', ['model' => 'gift product']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.gift.product.index', $gift_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete gift product']));
        }
    }
}
