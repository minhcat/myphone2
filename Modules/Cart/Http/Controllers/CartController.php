<?php

namespace Modules\Cart\Http\Controllers;

use App\Enums\OrderStatus;
use App\Events\CreateOrderEvent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Repositories\CartRepository;
use Modules\Order\Repositories\OrderDetailRepository;
use Modules\Order\Repositories\OrderRepository;
use Modules\Product\Repositories\ProductRepository;

class CartController extends Controller
{
    /** @var \Modules\Cart\Repositories\CartRepository */
    protected $cartRepository;

    /** @var \Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /** @var \Modules\Order\Repositories\OrderDetailRepository */
    protected $orderDetailRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /**
     * Create new Cart Controller instance.
     */
    public function __construct()
    {
        $this->cartRepository = new CartRepository;
        $this->orderRepository = new OrderRepository;
        $this->orderDetailRepository = new OrderDetailRepository;
        $this->productRepository = new ProductRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'cart']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $carts  = $this->cartRepository->paginate($search);

        return view('cart::cart.index', compact('carts'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);

        return view('cart::cart.detail', compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function order(Request $request, $id)
    {
        $request->validate([
            'address_id'    => 'required',
        ]);

        $cart = $this->cartRepository->find($id);
        $order = $this->orderRepository->create([
            'user_id'       => $cart->user->id,
            'address_id'    => $request->input('address_id'),
            'status'        => OrderStatus::PENDING,
            'note'          => $request->input('note') ?? '',
        ]);

        $details = $request->input('details');
        foreach ($details as $product_id => $quantity) {
            $product = $this->productRepository->find($product_id);
            $this->orderDetailRepository->create([
                'order_id'      => $order->id,
                'product_id'    => $product_id,
                'quantity'      => $quantity,
                'price'         => $product->price,
            ]);
        }

        event(new CreateOrderEvent($order));

        return redirect()->route('cart.index')->with('success', 'Create new order successfully');
    }
}
