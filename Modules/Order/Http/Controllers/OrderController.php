<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Repositories\OrderRepository;

class OrderController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Order\Repositories\OrderRepository */
    protected $orderRepository;

    /**
     * Create new order controller instance.
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
        try {
            $this->authorize('order:browse');

            $search = $request->input('search');
            $orders = $this->orderRepository->paginate($search);
    
            return view('order::order.index', compact('orders'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse order']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        try {
            $this->authorize('order:read');

            $order = $this->orderRepository->find($id);
    
            return view('order::order.show', compact('order'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.order.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'read order']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            $this->authorize('order:approve');

            $request->validate([
                'status'  => 'required'
            ]);
    
            $this->orderRepository->update($id, $request->all());
    
            return redirect()->route('admin.order.index')->with('success', __('notification.update.success', ['model' => 'order']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.order.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'approve order']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $this->authorize('order:delete');

            $this->orderRepository->delete($id);
    
            return redirect()->route('admin.order.index')->with('success', __('notification.delete.success', ['model' => 'order']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.order.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'delete order']));
        }
    }

    /**
     * Show the specified resource with invoice type.
     * @param int $id
     * @return Renderable
     */
    public function showInvoice($id)
    {
        try {
            $this->authorize('order:read');

            $order = $this->orderRepository->find($id);
    
            return view('order::order.invoice', compact('order'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.order.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'read order']));
        }
    }
}
