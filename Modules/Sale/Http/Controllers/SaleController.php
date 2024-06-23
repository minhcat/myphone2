<?php

namespace Modules\Sale\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Sale\Repositories\SaleRepository;

class SaleController extends Controller
{
    /** @var \Modules\Sale\Repositories\SaleRepository */
    protected $saleRepository;

    /**
     * Create a new Product controller instance.
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
        $search = $request->input('search');
        $sales = $this->saleRepository->paginate($search);

        return view('sale::sale.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('sale.store'),
            'method'    => 'POST',
        ];
        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();
        
        return view('sale::sale.create', compact('form', 'discount_targets', 'discount_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $this->saleRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);

        return redirect()->route('sale.index')->with('success', __('notification.create.success', ['model' => 'sale']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $sale = $this->saleRepository->find($id);

        return view('sale::sale.detail', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('sale.update', $id),
            'method'    => 'PUT',
        ];

        $sale = $this->saleRepository->find($id);
        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();

        return view('sale::sale.edit', compact('form', 'sale', 'discount_targets', 'discount_types'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->saleRepository->update($id, $request->all());

        return redirect()->route('sale.index')->with('success', __('notification.update.success', ['model' => 'sale']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->saleRepository->delete($id);

        return redirect()->route('sale.index')->with('success', __('notification.delete.success', ['model' => 'sale']));
    }
}
