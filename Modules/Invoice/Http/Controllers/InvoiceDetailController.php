<?php

namespace Modules\Invoice\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Invoice\Repositories\InvoiceDetailRepository;

class InvoiceDetailController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Invoice\Repositories\InvoiceDetailRepository */
    protected $invoiceDetailRepository;

    /**
     * Create new invoice detail controller instance.
     */
    public function __construct()
    {
        $this->invoiceDetailRepository = new InvoiceDetailRepository;

        view()->share('menu', ['group' => 'invoice', 'active' => 'invoice']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $invoice_id)
    {
        try {
            $this->authorize('invoice_detail:browse');

            $search = $request->input('search');
            $details = $this->invoiceDetailRepository->paginateByInvoiceId($invoice_id, $search);
    
            return view('invoice::detail.index', compact('details', 'invoice_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.invoice.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse invoice detail']));
        }
    }
}
