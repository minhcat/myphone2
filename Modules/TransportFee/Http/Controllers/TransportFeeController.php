<?php

namespace Modules\TransportFee\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TransportFee\Repositories\TransportFeeRepository;

class TransportFeeController extends Controller
{
    /** @var \Modules\TransportFee\Repositories\TransportFeeRepository */
    protected $transportFeeRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->transportFeeRepository = new TransportFeeRepository();

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
