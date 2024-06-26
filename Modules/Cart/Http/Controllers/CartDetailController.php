<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Repositories\CartDetailRepository;
use Modules\Product\Repositories\ProductRepository;

class CartDetailController extends Controller
{
    /** @var \Modules\Cart\Repositories\CartDetailRepository */
    protected $cartDetailRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /**
     * Create new Cart Controller instance.
     */
    public function __construct()
    {
        $this->cartDetailRepository = new CartDetailRepository;
        $this->productRepository = new ProductRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'cart']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($cart_id)
    {
        $details = $this->cartDetailRepository->paginateByCartId($cart_id);

        return view('cart::detail.index', compact('details', 'cart_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($cart_id)
    {
        $products = $this->productRepository->all();
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.cart.detail.store', $cart_id),
            'method'    => 'POST',
        ];

        return view('cart::detail.create', compact('products', 'form', 'cart_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $cart_id)
    {
        $request->validate([
            'product_id'    => 'required',
            'quantity'      => 'required|numeric'
        ]);
        $product = $this->productRepository->find($request->input('product_id'));

        $cart_detail = $this->cartDetailRepository->findWhere(['cart_id' => $cart_id, 'product_id' => $product->id]);

        if (!is_null($cart_detail)) {
            $quantity = $cart_detail->quantity + intval($request->input('quantity'));

            $this->cartDetailRepository->update($cart_detail->id, ['quantity' => $quantity]);

            return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.create.success', ['model' => 'cart detail']));
        }

        $this->cartDetailRepository->create($request->all(), ['cart_id' => $cart_id, 'price' => $product->price ?: 0]);

        return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.create.success', ['model' => 'cart detail']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($cart_id, $id)
    {
        $products = $this->productRepository->all();
        $form = [
            'title'     => 'Update',
            'url'       => route('admin.cart.detail.update', ['cart_id' => $cart_id, 'id' => $id]),
            'method'    => 'PUT',
        ];
        $detail = $this->cartDetailRepository->find($id);

        return view('cart::detail.edit', compact('form', 'products', 'detail', 'cart_id'));
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
            'product_id'    => 'required',
            'quantity'      => 'required|numeric'
        ]);
        $product = $this->productRepository->find($request->input('product_id'));

        $cart_detail = $this->cartDetailRepository->findWhere(['cart_id' => $cart_id, 'product_id' => $product->id]);

        if (!is_null($cart_detail)) {
            $this->cartDetailRepository->update($cart_detail->id, ['quantity' => intval($request->input('quantity'))]);

            return redirect()->route('admin.cart.detail.index', $cart_id)->with('success', __('notification.update.success', ['model' => 'cart detail']));
        }

        $this->cartDetailRepository->create($request->all(), ['cart_id' => $cart_id, 'price' => $product->price]);

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
