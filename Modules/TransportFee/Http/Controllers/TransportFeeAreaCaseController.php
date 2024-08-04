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
    public function index()
    {
        return view('transportfee::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('transportfee::create');
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
        return view('transportfee::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('transportfee::edit');
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
