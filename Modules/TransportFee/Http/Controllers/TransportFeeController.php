<?php

namespace Modules\TransportFee\Http\Controllers;

use App\Enums\TotalRangeType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Area\Repositories\AreaRepository;
use Modules\Transporter\Repositories\TransporterCaseRepository;
use Modules\Transporter\Repositories\TransporterRepository;
use Modules\TransportFee\Repositories\TransportFeeRepository;

class TransportFeeController extends Controller
{
    /** @var \Modules\TransportFee\Repositories\TransportFeeRepository */
    protected $transportFeeRepository;

    /** @var \Modules\Area\Repositories\AreaRepository */
    protected $areaRepository;

    /** @var \Modules\Transporter\Repositories\TransporterRepository */
    protected $transporterRepository;

    /** @var \Modules\Transporter\Repositories\TransporterCaseRepository */
    protected $transporterCaseRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->transportFeeRepository = new TransportFeeRepository();
        $this->areaRepository = new AreaRepository();
        $this->transporterRepository = new TransporterRepository();
        $this->transporterCaseRepository = new TransporterCaseRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'transport_fee']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $transport_fees = $this->transportFeeRepository->paginate($search);

        return view('transportfee::index', compact('transport_fees'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.transport_fee.store'),
            'method'    => 'POST'
        ];
        $total_range_types = TotalRangeType::getObject();
        $areas = $this->areaRepository->all();
        $transporters = $this->transporterRepository->all();
        $transporter_cases = $this->transporterCaseRepository->all();

        return view('transportfee::create', compact('form', 'areas', 'total_range_types', 'transporters', 'transporter_cases'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'                  => 'required',
            'area_id'               => 'required|numeric',
            'transporter_case_id'   => 'required|numeric',
            'top_range_bottom_type' => 'numeric',
            'top_range_bottom'      => 'numeric',
            'top_range_top_type'    => 'numeric',
            'top_range_top'         => 'numeric',
        ]);

        $this->transportFeeRepository->create($request->all());

        return redirect()
        ->route('admin.transport_fee.index')
        ->with('success', __('notification.create.success', ['model' => 'transport fee']));
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
    public function edit($id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.transport_fee.update', $id),
            'method'    => 'PUT'
        ];
        $total_range_types = TotalRangeType::getObject();
        $areas = $this->areaRepository->all();
        $transporters = $this->transporterRepository->all();
        $transporter_cases = $this->transporterCaseRepository->all();
        $transport_fee = $this->transportFeeRepository->find($id);

        return view('transportfee::edit', compact(
            'form', 'areas', 'total_range_types', 'transporters', 'transporter_cases', 'transport_fee'
        ));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'                  => 'required',
            'area_id'               => 'required|numeric',
            'transporter_case_id'   => 'required|numeric',
            'top_range_bottom_type' => 'numeric',
            'top_range_bottom'      => 'numeric',
            'top_range_top_type'    => 'numeric',
            'top_range_top'         => 'numeric',
        ]);

        $this->transportFeeRepository->update($id, $request->all());

        return redirect()
        ->route('admin.transport_fee.index')
        ->with('success', __('notification.update.success', ['model' => 'transport fee']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->transportFeeRepository->delete($id);

        return redirect()
        ->route('admin.transport_fee.index')
        ->with('success', __('notification.delete.success', ['model' => 'transport fee']));
    }
}
