<?php

namespace Modules\Promotion\Http\Controllers;

use App\Enums\ConditionType;
use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Promotion\Repositories\PromotionRepository;

class PromotionController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Promotion\Repositories\PromotionRepository */
    protected $promotionRepository;

    /**
     * Create a new promotion controller instance.
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
        try {
            $this->authorize('promotion:browse');

            $search = $request->input('search');
            $promotions = $this->promotionRepository->paginate($search);
    
            return view('promotion::index', compact('promotions'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse promotion']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('promotion:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.promotion.store'),
                'method'    => 'POST',
            ];
            $condition_types = ConditionType::getObject();
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
    
            return view('promotion::create', compact('form', 'condition_types', 'discount_targets', 'discount_types'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'add promotion']));
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
            $this->authorize('promotion:add');

            $request->validate([
                'name'      => 'required',
            ]);
    
            $this->promotionRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);
    
            return redirect()->route('admin.promotion.index')->with('success', __('notification.create.success', ['model' => 'promotion']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'add promotion']));
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
            $this->authorize('promotion:read');

            $promotion = $this->promotionRepository->find($id);
    
            return view('promotion::show', compact('promotion'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'read promotion']));
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
            $this->authorize('promotion:edit');
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

        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'edit promotion']));
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
            $this->authorize('promotion:edit');

            $this->promotionRepository->update($id, $request->all());
    
            return redirect()->route('admin.promotion.index')->with('success', __('notification.update.success', ['model' => 'promotion']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'edit promotion']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $this->authorize('promotion:edit');

            $request->validate([
                'status'    => 'required'
            ]);

            $this->promotionRepository->update($id, $request->only('status'));
    
            return redirect()->route('admin.promotion.index')->with('success', __('notification.update.success', ['model' => 'promotion']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'edit promotion']));
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
            $this->authorize('promotion:delete');

            $this->promotionRepository->delete($id);
    
            return redirect()->route('admin.promotion.index')->with('success', __('notification.delete.success', ['model' => 'promotion']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.promotion.index')->with('danger', __('notification.permission.fail', ['action' => 'delete promotion']));
        }
    }
}
