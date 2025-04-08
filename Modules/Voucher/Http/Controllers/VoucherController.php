<?php

namespace Modules\Voucher\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use App\Enums\PromotionStatus;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Voucher\Repositories\VoucherRepository;

class VoucherController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Voucher\Repositories\VoucherRepository */
    protected $voucherRepository;

    /**
     * Create a new voucher controller instance.
     */
    public function __construct()
    {
        $this->voucherRepository = new VoucherRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'voucher']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('voucher:browse');

            $search = $request->input('search');
            $vouchers = $this->voucherRepository->paginate($search);
    
            return view('voucher::voucher.index', compact('vouchers'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse voucher']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('voucher:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.voucher.store'),
                'method'    => 'POST',
            ];
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
    
            return view('voucher::voucher.create', compact('form', 'discount_targets', 'discount_types'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'add voucher']));
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
            $this->authorize('voucher:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->voucherRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);
    
            return redirect()->route('admin.voucher.index')->with('success', __('notification.create.success', ['model' => 'voucher']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'add voucher']));
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
            $this->authorize('voucher:read');

            $voucher = $this->voucherRepository->find($id);
    
            return view('voucher::voucher.show', compact('voucher'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'read voucher']));
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
            $this->authorize('voucher:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.voucher.update', $id),
                'method'    => 'PUT',
            ];
            $voucher = $this->voucherRepository->find($id);
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
    
            return view('voucher::voucher.edit', compact('form', 'voucher', 'discount_targets', 'discount_types'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'edit voucher']));
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
            $this->authorize('voucher:edit');

            $this->voucherRepository->update($id, $request->all());
    
            return redirect()->route('admin.voucher.index')->with('success', __('notification.update.success', ['model' => 'voucher']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'edit voucher']));
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
            $this->authorize('voucher:edit');

            $request->validate([
                'status'    => 'required'
            ]);

            $this->voucherRepository->update($id, $request->only('status'));
    
            return redirect()->route('admin.voucher.index')->with('success', __('notification.update.success', ['model' => 'voucher']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'edit voucher']));
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
            $this->authorize('voucher:delete');

            $this->voucherRepository->delete($id);
    
            return redirect()->route('admin.voucher.index')->with('success', __('notification.delete.success', ['model' => 'voucher']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.voucher.index')->with('danger', __('notification.permission.fail', ['action' => 'delete voucher']));
        }
    }
}
