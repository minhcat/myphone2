<?php

namespace Modules\Voucher\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Voucher\Repositories\VoucherCodeRepository;

class VoucherCodeController extends Controller
{
    /** @var \Modules\Voucher\Repositories\VoucherCodeRepository */
    protected $voucherCodeRepository;

    /**
     * Create a new Product controller instance.
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
    public function create()
    {
        return view('voucher::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('voucher::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('voucher::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
