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
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $cart_id)
    {
        $search = $request->input('search');
        $details = $this->cartDetailRepository->paginateByCartId($cart_id, $search);
        $menu = ['group' => 'invoice', 'active' => 'cart'];

        return view('cart::details.index', compact('details', 'menu', 'cart_id'));
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
            'url'       => route('cart.detail.store', $cart_id),
            'method'    => 'POST',
        ];
        $menu = [
            'group' => 'invoice',
            'active' => 'cart'
        ];

        return view('cart::details.create', compact('products', 'form', 'menu', 'cart_id'));
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

            return redirect()->route('cart.detail.index', $cart_id)->with('success', 'Create new cart detail successfully');
        }

        $this->cartDetailRepository->create($request->all(), ['cart_id' => $cart_id, 'price' => $product->price ?: 0]);

        return redirect()->route('cart.detail.index', $cart_id)->with('success', 'Create new cart detail successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cart::show');
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
            'url'       => route('cart.detail.update', ['cart_id' => $cart_id, 'id' => $id]),
            'method'    => 'PUT',
        ];
        $menu = [
            'group' => 'invoice',
            'active' => 'cart'
        ];
        $detail = $this->cartDetailRepository->find($id);

        return view('cart::details.edit', compact('form', 'menu', 'products', 'detail', 'cart_id'));
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

            return redirect()->route('cart.detail.index', $cart_id)->with('success', 'Update cart detail successfully');
        }

        $this->cartDetailRepository->create($request->all(), ['cart_id' => $cart_id, 'price' => $product->price]);

        $this->cartDetailRepository->delete($id);

        return redirect()->route('cart.detail.index', $cart_id)->with('success', 'Update cart detail successfully');
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
