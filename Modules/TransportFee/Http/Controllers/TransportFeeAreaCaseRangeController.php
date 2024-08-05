<?php

namespace Modules\TransportFee\Http\Controllers;

use App\Enums\TotalRangeType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TransportFee\Repositories\TransportFeeAreaCaseRangeRepository;

class TransportFeeAreaCaseRangeController extends Controller
{
    /** @var \Modules\TransportFee\Repositories\TransportFeeAreaCaseRangeRepository */
    protected $transportFeeAreaCaseRangeRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->transportFeeAreaCaseRangeRepository = new TransportFeeAreaCaseRangeRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'transport_fee']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($transport_fee_id, $transport_fee_area_id, $transport_fee_area_case_id)
    {
        $transport_fee_area_case_ranges = $this->transportFeeAreaCaseRangeRepository->paginateByTransportFeeAreaCaseId($transport_fee_area_case_id);

        return view('transportfee::range.index', compact('transport_fee_area_case_ranges', 'transport_fee_id', 'transport_fee_area_id', 'transport_fee_area_case_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($transport_fee_id, $transport_fee_area_id, $transport_fee_area_case_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.transport_fee.area.case.range.store', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id]),
            'method'    => 'POST'
        ];
        $total_range_types = TotalRangeType::getObject();

        return view('transportfee::range.create', compact('form', 'total_range_types', 'transport_fee_id', 'transport_fee_area_id', 'transport_fee_area_case_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $transport_fee_id, $transport_fee_area_id, $transport_fee_area_case_id)
    {
        $request->validate([
            'cost'  => 'required'
        ]);

        $this->transportFeeAreaCaseRangeRepository->create($request->all(), ['transport_fee_area_case_id' => $transport_fee_area_case_id]);

        return redirect()
        ->route('admin.transport_fee.area.case.range.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id])
        ->with('success', __('notification.create.success', ['model' => 'transport fee area case range']));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($transport_fee_id, $transport_fee_area_id, $transport_fee_area_case_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.transport_fee.area.case.range.update', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id, 'id' => $id]),
            'method'    => 'PUT'
        ];
        $total_range_types = TotalRangeType::getObject();
        $transport_fee_area_case_range = $this->transportFeeAreaCaseRangeRepository->find($id);

        return view('transportfee::range.edit', compact('form', 'total_range_types', 'transport_fee_area_case_range', 'transport_fee_id', 'transport_fee_area_id', 'transport_fee_area_case_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $transport_fee_id, $transport_fee_area_id, $transport_fee_area_case_id, $id)
    {
        $request->validate([
            'cost'  => 'required'
        ]);

        $this->transportFeeAreaCaseRangeRepository->update($id, $request->all());

        return redirect()
        ->route('admin.transport_fee.area.case.range.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id])
        ->with('success', __('notification.update.success', ['model' => 'transport fee area case range']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($transport_fee_id, $transport_fee_area_id, $transport_fee_area_case_id, $id)
    {
        $this->transportFeeAreaCaseRangeRepository->delete($id);

        return redirect()
        ->route('admin.transport_fee.area.case.range.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'transport_fee_area_case_id' => $transport_fee_area_case_id])
        ->with('success', __('notification.delete.success', ['model' => 'transport fee area case range']));
    }
}
