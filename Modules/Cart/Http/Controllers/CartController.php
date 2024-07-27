<?php

namespace Modules\Cart\Http\Controllers;

use App\Enums\OrderStatus;
use App\Enums\TargetType;
use App\Events\CreateOrderEvent;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Repositories\CartDetailRepository;
use Modules\Cart\Repositories\CartRepository;
use Modules\Order\Repositories\OrderDetailRepository;
use Modules\Order\Repositories\OrderRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;
use Modules\Transporter\Repositories\TransporterCaseRepository;
use Modules\Transporter\Repositories\TransporterRepository;
use Modules\User\Repositories\AddressRepository;

class CartController extends Controller
{
    /** @var \Modules\Cart\Repositories\CartRepository */
    protected $cartRepository;

    /** @var \Modules\Cart\Repositories\CartDetailRepository */
    protected $cartDetailRepository;

    /** @var \Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /** @var \Modules\Order\Repositories\OrderDetailRepository */
    protected $orderDetailRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variantRepository;

    /** @var \Modules\Transporter\Repositories\TransporterRepository */
    protected $transporterRepository;

    /** @var \Modules\Transporter\Repositories\TransporterCaseRepository */
    protected $transporterCaseRepository;

    /**
     * Create new Cart Controller instance.
     */
    public function __construct()
    {
        $this->cartRepository = new CartRepository;
        $this->cartDetailRepository = new CartDetailRepository;
        $this->orderRepository = new OrderRepository;
        $this->orderDetailRepository = new OrderDetailRepository;
        $this->productRepository = new ProductRepository;
        $this->variantRepository = new VariationRepository;
        $this->transporterRepository = new TransporterRepository;
        $this->transporterCaseRepository = new TransporterCaseRepository;

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
        $transporters = $this->transporterRepository->all();
        $cases = $this->transporterCaseRepository->all();

        return view('cart::cart.index', compact('carts', 'transporters', 'cases'));
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
            'user_id'               => $cart->user->id,
            'address_id'            => $request->input('address_id'),
            'transporter_case_id'   => $request->input('transporter_case_id'),
            'voucher_code'          => $request->input('voucher_code'),
            'status'                => OrderStatus::PENDING,
            'note'                  => $request->input('note') ?? '',
        ]);

        $target_ids = [];
        $details = $request->input('details');
        foreach ($details as $target_id => $data) {
            $target_ids[] = [$data['target_type'], $target_id, $data['quantity']];
            if ($data['target_type'] == TargetType::VARIANT) {
                $target = $this->variantRepository->find($target_id);
            } else {
                $target = $this->productRepository->find($target_id);
            }
            $this->orderDetailRepository->create([
                'order_id'      => $order->id,
                'target_type'   => $data['target_type'],
                'target_id'     => $target_id,
                'quantity'      => $data['quantity'],
                'price'         => $target->price,
            ]);
        }

        foreach ($target_ids as $target) {
            $cart_detail = $this->cartDetailRepository->findWhere([['cart_id', $id], ['target_type', $target[0]], ['target_id', $target[1]]]);
            if (isset($cart_detail) && $cart_detail->quantity == $target[2]) {
                $this->cartDetailRepository->deleteWhere([['cart_id', $id], ['target_type', $target[0]], ['target_id', $target[1]]]);
            } elseif (isset($cart_detail)) {
                $this->cartDetailRepository->update($cart_detail->id, ['quantity' => $cart_detail->quantity - $target[2]]);
            }
        }

        event(new CreateOrderEvent($order));

        return redirect()->route('admin.cart.index')->with('success', __('notification.create.success', ['model' => 'order']));
    }
}
