<?php

namespace Modules\Promotion\Http\Controllers;

use App\Enums\ConditionType;
use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Promotion\Repositories\PromotionRepository;

class PromotionController extends Controller
{
    /** @var \Modules\Promotion\Repositories\PromotionRepository */
    protected $promotionRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->promotionRepository = new PromotionRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'promotion']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $promotions = $this->promotionRepository->paginate($search);

        return view('promotion::index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.promotion.store'),
            'method'    => 'POST',
        ];
        $condition_types = ConditionType::getObject();
        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();

        return view('promotion::create', compact('form', 'condition_types', 'discount_targets', 'discount_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        $this->promotionRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);

        return redirect()->route('admin.promotion.index')->with('success', __('notification.create.success', ['model' => 'promotion']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $promotion = $this->promotionRepository->find($id);

        return view('promotion::show', compact('promotion'));
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
            'url'       => route('admin.promotion.update', $id),
            'method'    => 'PUT',
        ];

        $promotion = $this->promotionRepository->find($id);
        $condition_types = ConditionType::getObject();
        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();

        return view('promotion::edit', compact('form', 'promotion', 'condition_types', 'discount_targets', 'discount_types'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->promotionRepository->update($id, $request->all());

        return redirect()->route('admin.promotion.index')->with('success', __('notification.update.success', ['model' => 'promotion']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->promotionRepository->delete($id);

        return redirect()->route('admin.promotion.index')->with('success', __('notification.delete.success', ['model' => 'promotion']));
    }
}
