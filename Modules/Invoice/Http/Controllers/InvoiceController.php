<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Invoice\Repositories\InvoiceRepository;

class InvoiceController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Invoice\Repositories\InvoiceRepository */
    protected $invoiceRepository;

    /**
     * Create new invoice controller instance.
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
        try {
            $this->authorize('invoice:browse');

            $search = $request->input('search');
            $invoices = $this->invoiceRepository->paginate($search);

            return view('invoice::invoice.index', compact('invoices'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse invoice']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        try {
            $this->authorize('invoice:read');

            $invoice = $this->invoiceRepository->find($id);

            return view('invoice::invoice.show', compact('invoice'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.invoice.index')->with('danger', __('notification.permission.fail', ['action' => 'read invoice']));
        }
    }

    /**
     * Show the specified resource with invoice type.
     * @param int $id
     * @return Renderable
     */
    public function showInvoice($id)
    {
        try {
            $this->authorize('invoice:read');

            $invoice = $this->invoiceRepository->find($id);

            return view('invoice::invoice.invoice', compact('invoice'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.invoice.index')->with('danger', __('notification.permission.fail', ['action' => 'read invoice']));
        }
    }
}
