<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderDetailRepository;
use Modules\Product\Repositories\ProductRepository;

class OrderDetailController extends Controller
{
    /** @var \Modules\Order\Repositories\OrderDetailRepository */
    protected $orderDetailRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /**
     * Create new Order Controller instance.
     */
    public function __construct()
    {
        $this->orderDetailRepository = new OrderDetailRepository;
        $this->productRepository = new ProductRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'order']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($order_id)
    {
        $details = $this->orderDetailRepository->paginateByOrderId($order_id);

        return view('order::detail.index', compact('details', 'order_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($order_id)
    {
        $products = $this->productRepository->all();
        $form = [
            'title'     => 'Create',
            'url'       => route('order.detail.store', $order_id),
            'method'    => 'POST',
        ];

        return view('order::detail.create', compact('products', 'form', 'order_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $order_id)
    {
        $request->validate([
            'product_id'    => 'required',
            'quantity'      => 'required|numeric'
        ]);

        $product = $this->productRepository->find($request->input('product_id'));

        $detail = $this->orderDetailRepository->findWhere(['order_id' => $order_id,'product_id' => $product->id]);

        if (!is_null($detail)) {
            $quantity = $detail->quantity + intval($request->input('quantity'));

            $this->orderDetailRepository->update($detail->id, ['quantity' => $quantity]);

            return redirect()->route('order.detail.index', $order_id)->with('success', __('notification.create.success', ['model' => 'order detail']));
        }

        $this->orderDetailRepository->create($request->all(), ['price' => $product->price ?: 0, 'order_id' => $order_id]);

        return redirect()->route('order.detail.index', $order_id)->with('success', __('notification.create.success', ['model' => 'order detail']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('order::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($order_id, $id)
    {
        $detail = $this->orderDetailRepository->find($id);
        $products = $this->productRepository->all();
        $form = [
            'title'     => 'Edit',
            'url'       => route('order.detail.update', ['order_id' => $order_id, 'id' => $id]),
            'method'    => 'PUT'
        ];

        return view('order::detail.edit', compact('detail', 'products', 'form', 'order_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $order_id, $id)
    {
        $request->validate([
            'product_id'    => 'required',
            'quantity'      => 'required|numeric'
        ]);

        $product = $this->productRepository->find($request->input('product_id'));
        $detail = $this->orderDetailRepository->findWhere(['product_id' => $product->id, 'order_id' => $order_id]);

        if (!is_null($detail)) {
            $this->orderDetailRepository->update($detail->id, ['quantity' => intval($request->input('quantity'))]);

            return redirect()->route('order.detail.index', $order_id)->with('success', __('notification.update.success', ['model' => 'order detail']));
        }

        $this->orderDetailRepository->create($request->all(), ['price' => $product->price, 'order_id' => $order_id]);

        $this->orderDetailRepository->delete($id);

        return redirect()->route('order.detail.index', $order_id)->with('success', __('notification.update.success', ['model' => 'order detail']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($order_id, $id)
    {
        $this->orderDetailRepository->delete($id);

        return redirect()->route('order.detail.index', $order_id)->with('success', __('notification.delete.success', ['model' => 'order detail']));
    }
}
