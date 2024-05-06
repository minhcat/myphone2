<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderRepository;

class OrderController extends Controller
{
    /** @var Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /**
     * Create new Order Controller instance.
     */
    public function __construct()
    {
        $this->orderRepository = new OrderRepository;
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
        return view('order::show');
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
