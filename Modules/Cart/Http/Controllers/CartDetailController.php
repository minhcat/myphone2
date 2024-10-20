<?php

namespace Modules\Cart\Http\Controllers;

use App\Enums\TargetType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Repositories\CartDetailRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;

class CartDetailController extends Controller
{
    /** @var \Modules\Cart\Repositories\CartDetailRepository */
    protected $cartDetailRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variantRepository;

    /**
     * Create new cart detail Controller instance.
     */
    public function __construct()
    {
        $this->cartDetailRepository = new CartDetailRepository;
        $this->productRepository = new ProductRepository;
        $this->variantRepository = new VariationRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'cart']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $cart_id)
    {
        $search = $request->input('search');
        $details = $this->cartDetailRepository->paginateByCartId($cart_id, $search);

        return view('cart::detail.index', compact('details', 'cart_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($cart_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.cart.detail.store', $cart_id),
            'method'    => 'POST',
        ];
        
        $products = $this->productRepository->all();
        $variants = $this->variantRepository->all();
        $target_types = TargetType::getObject();

        return view('cart::detail.create', compact('products', 'form', 'cart_id', 'products', 'variants', 'target_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $cart_id)
    {
        $request->validate([
            'target_type'   => 'required',
            'target_id'     => 'required',
            'quantity'      => 'required|numeric'
        ]);

        $target_type = $request->input('target_type');
        if ($target_type == TargetType::VARIANT) {    // compare string and int
            $target = $this->variantRepository->find($request->input('target_id'));
        } else {
            $target = $this->productRepository->find($request->input('target_id'));
        }

        $cart_detail = $this->cartDetailRepository->findWhere([
            ['cart_id', $cart_id],
            ['target_type', $target_type],
            ['target_id', $target->id]
        ]);

        if (!is_null($cart_detail)) {
            $quantity = $cart_detail->quantity + intval($request->input('quantity'));

            $this->cartDetailRepository->update($cart_detail->id, ['quantity' => $quantity]);

            return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.create.success', ['model' => 'cart detail']));
        }

        $this->cartDetailRepository->create($request->all(), ['cart_id' => $cart_id, 'price' => $target->price ?: 0]);

        return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.create.success', ['model' => 'cart detail']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($cart_id, $id)
    {
        $form = [
            'title'     => 'Update',
            'url'       => route('admin.cart.detail.update', ['cart_id' => $cart_id, 'id' => $id]),
            'method'    => 'PUT',
        ];

        $detail = $this->cartDetailRepository->find($id);
        $products = $this->productRepository->all();
        $variants = $this->variantRepository->all();
        $target_types = TargetType::getObject();

        return view('cart::detail.edit', compact('form', 'products', 'detail', 'cart_id', 'variants', 'target_types'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $cart_id, $id)
    {
        $request->validate([
            'target_type'   => 'required',
            'target_id'     => 'required',
            'quantity'      => 'required|numeric'
        ]);

        $target_type = $request->input('target_type');
        if ($target_type == TargetType::VARIANT) {
            $target = $this->variantRepository->find($request->input('target_id'));
        } else {
            $target = $this->productRepository->find($request->input('target_id'));
        }

        $cart_detail = $this->cartDetailRepository->findWhere([
            ['cart_id', $cart_id],
            ['target_type', $target_type],
            ['target_id', $target->id]
        ]);

        if (!is_null($cart_detail)) {
            $this->cartDetailRepository->update($cart_detail->id, ['quantity' => intval($request->input('quantity'))]);

            return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.update.success', ['model' => 'cart detail']));
        }

        $this->cartDetailRepository->create($request->all(), ['cart_id' => $cart_id, 'price' => $target->price]);

        $this->cartDetailRepository->delete($id);

        return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.update.success', ['model' => 'cart detail']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($cart_id, $id)
    {
        $this->cartDetailRepository->delete($id);

        return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.delete.success', ['model' => 'cart detail']));
    }
}
