<?php

namespace Modules\TransportFee\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Transporter\Repositories\TransporterCaseRepository;
use Modules\TransportFee\Repositories\TransportFeeAreaCaseRepository;

class TransportFeeAreaCaseController extends Controller
{
    /** @var \Modules\TransportFee\Repositories\TransportFeeAreaCaseRepository */
    protected $transportFeeAreaCaseRepository;

    /** @var \Modules\Transporter\Repositories\TransporterCaseRepository */
    protected $caseRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->transportFeeAreaCaseRepository = new TransportFeeAreaCaseRepository();
        $this->caseRepository = new TransporterCaseRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'transport_fee']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($transport_fee_id, $transport_fee_area_id)
    {
        $transport_fee_area_cases = $this->transportFeeAreaCaseRepository->paginateByTransportFeeAreaId($transport_fee_area_id);

        return view('transportfee::case.index', compact('transport_fee_area_cases', 'transport_fee_id', 'transport_fee_area_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($transport_fee_id, $transport_fee_area_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.transport_fee.area.case.index', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id]),
            'method'    => 'POST'
        ];
        $cases = $this->caseRepository->all();

        return view('transportfee::case.create', compact('form', 'cases', 'transport_fee_id', 'transport_fee_area_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $transport_fee_id, $transport_fee_area_id)
    {
        $request->validate([
            'transporter_case_id'  => 'required'
        ]);

        $this->transportFeeAreaCaseRepository->create($request->all(), ['transport_fee_area_id' => $transport_fee_area_id]);

        return redirect()
        ->route('admin.transport_fee.area.case.index', compact('transport_fee_id', 'transport_fee_area_id'))
        ->with('success', __('notification.create.success', ['model' => 'transport fee area case']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('transportfee::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($transport_fee_id, $transport_fee_area_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.transport_fee.area.case.update', ['transport_fee_id' => $transport_fee_id, 'transport_fee_area_id' => $transport_fee_area_id, 'id' => $id]),
            'method'    => 'PUT'
        ];
        $cases = $this->caseRepository->all();
        $transport_fee_area_case = $this->transportFeeAreaCaseRepository->find($id);

        return view('transportfee::case.edit', compact('form', 'transport_fee_area_case', 'cases', 'transport_fee_id', 'transport_fee_area_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $transport_fee_id, $transport_fee_area_id, $id)
    {
        $request->validate([
            'transporter_case_id'  => 'required'
        ]);

        $this->transportFeeAreaCaseRepository->update($id, $request->all());

        return redirect()
        ->route('admin.transport_fee.area.case.index', compact('transport_fee_id', 'transport_fee_area_id'))
        ->with('success', __('notification.create.success', ['model' => 'transport fee area case']));
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
