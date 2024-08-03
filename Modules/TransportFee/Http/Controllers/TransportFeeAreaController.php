<?php

namespace Modules\TransportFee\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Area\Repositories\AreaRepository;
use Modules\TransportFee\Repositories\TransportFeeAreaRepository;

class TransportFeeAreaController extends Controller
{
    /** @var \Modules\TransportFee\Repositories\TransportFeeAreaRepository */
    protected $transportFeeAreaRepository;

    /** @var \Modules\Area\Repositories\AreaRepository */
    protected $areaRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->transportFeeAreaRepository = new TransportFeeAreaRepository();
        $this->areaRepository = new AreaRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'transport_fee']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($transport_fee_id)
    {
        $transport_fee_areas = $this->transportFeeAreaRepository->paginateByTransportFeeId($transport_fee_id);

        return view('transportfee::area.index', compact('transport_fee_areas', 'transport_fee_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($transport_fee_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.transport_fee.area.store', $transport_fee_id),
            'method'    => 'POST'
        ];
        $areas = $this->areaRepository->all();

        return view('transportfee::area.create', compact('form', 'transport_fee_id', 'areas'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $transport_fee_id)
    {
        $request->validate([
            'area_id'   => 'required'
        ]);

        $this->transportFeeAreaRepository->create($request->all(), ['transport_fee_id' => $transport_fee_id]);

        return redirect()
        ->route('admin.transport_fee.area.index', $transport_fee_id)
        ->with('success', __('notification.create.success', ['model' => 'transport fee area']));
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
    public function edit($transport_fee_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.transport_fee.area.update', ['transport_fee_id' => $transport_fee_id, 'id' => $id]),
            'method'    => 'PUT'
        ];
        $areas = $this->areaRepository->all();
        $transport_fee_area = $this->transportFeeAreaRepository->find($id);

        return view('transportfee::area.edit', compact('form', 'areas', 'transport_fee_area', 'transport_fee_id'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $transport_fee_id, $id)
    {
        $request->validate([
            'area_id'   => 'required'
        ]);

        $this->transportFeeAreaRepository->update($id, $request->all());

        return redirect()
        ->route('admin.transport_fee.area.index', $transport_fee_id)
        ->with('success', __('notification.update.success', ['model' => 'transport fee area']));
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
