<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Invoice\Repositories\InvoiceRepository;

class InvoiceController extends Controller
{
    /** @var \Modules\Invoice\Repositories\InvoiceRepository */
    protected $invoiceRepository;

    /**
     * Create new Cart Controller instance.
     */
    public function __construct()
    {
        $this->invoiceRepository = new InvoiceRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'invoice']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $invoices = $this->invoiceRepository->paginate($search);

        return view('invoice::invoice.index', compact('invoices'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        return view('invoice::invoice.detail', compact('invoice'));
    }

    /**
     * Show the specified resource with invoice type.
     * @param int $id
     * @return Renderable
     */
    public function showInvoice($id)
    {
        $invoice = $this->invoiceRepository->find($id);

        return view('invoice::invoice.invoice', compact('invoice'));
    }
}
