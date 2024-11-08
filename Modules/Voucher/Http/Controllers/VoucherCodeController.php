<?php

namespace Modules\Voucher\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Voucher\Repositories\VoucherCodeRepository;

class VoucherCodeController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Voucher\Repositories\VoucherCodeRepository */
    protected $voucherCodeRepository;

    /**
     * Create a new voucher code controller instance.
     */
    public function __construct()
    {
        $this->voucherCodeRepository = new VoucherCodeRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'voucher']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $voucher_id)
    {
        try {
            $this->authorize('voucher_code:browse');

            $search = $request->input('search');
            $voucher_codes = $this->voucherCodeRepository->paginateByVoucherId($voucher_id, $search);
    
            return view('voucher::code.index', compact('voucher_codes', 'voucher_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse voucher code']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($voucher_id)
    {
        try {
            $this->authorize('voucher_code:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.voucher.code.store', $voucher_id),
                'method'    => 'POST',
            ];
    
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
    
            return view('voucher::code.create', compact('form', 'discount_targets', 'discount_types', 'voucher_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add voucher code']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $voucher_id)
    {
        try {
            $this->authorize('voucher_code:add');

            $request->validate([
                'code'  => 'required|unique:voucher_codes'
            ]);
    
            $this->voucherCodeRepository->create($request->all(), ['voucher_id' => $voucher_id]);
    
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('success', __('notification.create.success', ['model' => 'voucher code']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add voucher code']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($voucher_id, $id)
    {
        try {
            $this->authorize('voucher_code:read');

            $voucher_code = $this->voucherCodeRepository->find($id);
    
            return view('voucher::code.show', compact('voucher_code', 'voucher_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'read voucher code']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($voucher_id, $id)
    {
        try {
            $this->authorize('voucher_code:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.voucher.code.update', ['voucher_id' => $voucher_id, 'id' => $id]),
                'method'    => 'PUT',
            ];
    
            $discount_targets = DiscountTarget::getObject();
            $discount_types = DiscountType::getObject();
            $voucher_code = $this->voucherCodeRepository->find($id);
    
            return view('voucher::code.edit', compact('form', 'voucher_code', 'discount_targets', 'discount_types', 'voucher_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit voucher code']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $voucher_id, $id)
    {
        try {
            $this->authorize('voucher_code:edit');

            $request->validate([
                'code'  => 'required|unique:voucher_codes,code,'.$id
            ]);
    
            $this->voucherCodeRepository->update($id, $request->all());
    
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('success', __('notification.update.success', ['model' => 'voucher code']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit voucher code']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($voucher_id, $id)
    {
        try {
            $this->authorize('voucher_code:delete');

            $this->voucherCodeRepository->delete($id);
    
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('success', __('notification.delete.success', ['model' => 'voucher code']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.voucher.code.index', $voucher_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete voucher code']));
        }
    }
}
