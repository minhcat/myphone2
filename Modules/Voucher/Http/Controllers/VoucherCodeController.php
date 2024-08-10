<?php

namespace Modules\Voucher\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Voucher\Repositories\VoucherCodeRepository;

class VoucherCodeController extends Controller
{
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
        $search = $request->input('search');
        $voucher_codes = $this->voucherCodeRepository->paginateByVoucherId($voucher_id, $search);

        return view('voucher::code.index', compact('voucher_codes', 'voucher_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($voucher_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.voucher.code.store', $voucher_id),
            'method'    => 'POST',
        ];

        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();

        return view('voucher::code.create', compact('form', 'discount_targets', 'discount_types', 'voucher_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $voucher_id)
    {
        $request->validate([
            'code'  => 'required|unique:voucher_codes'
        ]);

        $this->voucherCodeRepository->create($request->all(), ['voucher_id' => $voucher_id]);

        return redirect()
        ->route('admin.voucher.code.index', $voucher_id)
        ->with('success', __('notification.create.success', ['model' => 'voucher code']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($voucher_id, $id)
    {
        $voucher_code = $this->voucherCodeRepository->find($id);

        return view('voucher::code.show', compact('voucher_code', 'voucher_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($voucher_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.voucher.code.update', ['voucher_id' => $voucher_id, 'id' => $id]),
            'method'    => 'PUT',
        ];

        $discount_targets = DiscountTarget::getObject();
        $discount_types = DiscountType::getObject();
        $voucher_code = $this->voucherCodeRepository->find($id);

        return view('voucher::code.edit', compact('form', 'voucher_code', 'discount_targets', 'discount_types', 'voucher_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $voucher_id, $id)
    {
        $request->validate([
            'code'  => 'required|unique:voucher_codes,code,'.$id
        ]);

        $this->voucherCodeRepository->update($id, $request->all());

        return redirect()
        ->route('admin.voucher.code.index', $voucher_id)
        ->with('success', __('notification.update.success', ['model' => 'voucher code']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($voucher_id, $id)
    {
        $this->voucherCodeRepository->delete($id);

        return redirect()
        ->route('admin.voucher.code.index', $voucher_id)
        ->with('success', __('notification.delete.success', ['model' => 'voucher code']));
    }
}
