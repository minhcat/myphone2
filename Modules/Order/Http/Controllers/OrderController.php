<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderRepository;

class OrderController extends Controller
{
    /** @var \Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /**
     * Create new Order Controller instance.
     */
    public function __construct()
    {
        $this->orderRepository = new OrderRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'order']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $orders = $this->orderRepository->paginate($search);

        return view('order::order.index', compact('orders'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $order = $this->orderRepository->find($id);

        return view('order::order.detail', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status'  => 'required'
        ]);

        $this->orderRepository->update($id, $request->all());

        return redirect()->route('order.index')->with('success', 'Update order status successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->orderRepository->delete($id);

        return redirect()->route('order.index')->with('success', 'Delete order successfully');
    }
}