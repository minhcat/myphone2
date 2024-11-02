<?php

namespace Modules\Sale\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sale\Repositories\SaleRepository;

class SaleController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Sale\Repositories\SaleRepository */
    protected $saleRepository;

    /**
     * Create a new sale controller instance.
     */
    public function __construct()
    {
        $this->saleRepository = new SaleRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'sale']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('sale:browse');

            $search = $request->input('search');
            $sales = $this->saleRepository->paginate($search);
    
            return view('sale::sale.index', compact('sales'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse sale']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('sale:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.sale.store'),
                'method'    => 'POST',
            ];
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
            
            return view('sale::sale.create', compact('form', 'discount_targets', 'discount_types'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.sale.index')->with('danger', __('notification.permission.fail', ['action' => 'add sale']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $this->authorize('sale:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->saleRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);
    
            return redirect()->route('admin.sale.index')->with('success', __('notification.create.success', ['model' => 'sale']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.sale.index')->with('danger', __('notification.permission.fail', ['action' => 'add sale']));
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
            $this->authorize('sale:read');

            $sale = $this->saleRepository->find($id);
    
            return view('sale::sale.show', compact('sale'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.sale.index')->with('danger', __('notification.permission.fail', ['action' => 'read sale']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $this->authorize('sale:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.sale.update', $id),
                'method'    => 'PUT',
            ];
    
            $sale = $this->saleRepository->find($id);
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
    
            return view('sale::sale.edit', compact('form', 'sale', 'discount_targets', 'discount_types'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.sale.index')->with('danger', __('notification.permission.fail', ['action' => 'edit sale']));
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
            $this->authorize('sale:edit');

            $this->saleRepository->update($id, $request->all());
    
            return redirect()->route('admin.sale.index')->with('success', __('notification.update.success', ['model' => 'sale']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.sale.index')->with('danger', __('notification.permission.fail', ['action' => 'edit sale']));
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
            $this->authorize('sale:delete');

            $this->saleRepository->delete($id);
    
            return redirect()->route('admin.sale.index')->with('success', __('notification.delete.success', ['model' => 'sale']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.sale.index')->with('danger', __('notification.permission.fail', ['action' => 'delete sale']));
        }
    }
}
