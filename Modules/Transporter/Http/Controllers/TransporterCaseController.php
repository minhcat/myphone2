<?php

namespace Modules\Transporter\Http\Controllers;

use App\Enums\EstimateTimeType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Transporter\Repositories\TransporterCaseRepository;

class TransporterCaseController extends Controller
{
    /** @var \Modules\Transporter\Repositories\TransporterCaseRepository */
    protected $transporterCaseRepository;

    /**
     * Create a new transporter case controller instance.
     */
    public function __construct()
    {
        $this->transporterCaseRepository = new TransporterCaseRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'transporter']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $transporter_id)
    {
        $search = $request->input('search');
        $transporter_cases = $this->transporterCaseRepository->paginateByTransporterId($transporter_id, $search);

        return view('transporter::case.index', compact('transporter_cases', 'transporter_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($transporter_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.transporter.case.store', $transporter_id),
            'method'    => 'POST'
        ];
        $estimate_time_types = EstimateTimeType::getObject();

        return view('transporter::case.create', compact('form', 'transporter_id', 'estimate_time_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $transporter_id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $this->transporterCaseRepository->create($request->all(), ['transporter_id' => $transporter_id]);

        return redirect()
        ->route('admin.transporter.case.index', $transporter_id)
        ->with('success', __('notification.create.success', ['model' => 'transporter case']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($transporter_id, $id)
    {
        $transporter_case = $this->transporterCaseRepository->find($id);

        return view('transporter::case.show', compact('transporter_case', 'transporter_id'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($transporter_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('admin.transporter.case.update', ['transporter_id' => $transporter_id, 'id' => $id]),
            'method'    => 'PUT'
        ];
        $estimate_time_types = EstimateTimeType::getObject();
        $transporter_case = $this->transporterCaseRepository->find($id);

        return view('transporter::case.edit', compact('form', 'transporter_id', 'estimate_time_types', 'transporter_case'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $transporter_id, $id)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $this->transporterCaseRepository->update($id, $request->all(), ['transporter_id' => $transporter_id]);

        return redirect()
        ->route('admin.transporter.case.index', $transporter_id)
        ->with('success', __('notification.update.success', ['model' => 'transporter case']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($transporter_id, $id)
    {
        $this->transporterCaseRepository->delete($id);

        return redirect()
        ->route('admin.transporter.case.index', $transporter_id)
        ->with('success', __('notification.delete.success', ['model' => 'transporter case']));
    }
}
