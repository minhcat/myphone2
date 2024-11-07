<?php

namespace Modules\Transporter\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Transporter\Repositories\TransporterRepository;

class TransporterController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Transporter\Repositories\TransporterRepository */
    protected $transporterRepository;

    /**
     * Create a new transporter controller instance.
     */
    public function __construct()
    {
        $this->transporterRepository = new TransporterRepository();

        view()->share('menu', ['group' => 'transport', 'active' => 'transporter']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('transporter:browse');

            $search = $request->input('search');
            $transporters = $this->transporterRepository->paginate($search);
    
            return view('transporter::transporter.index', compact('transporters'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse transporter']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('transporter:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.transporter.store'),
                'method'    => 'POST'
            ];
    
            return view('transporter::transporter.create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.transporter.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'add transporter']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $this->authorize('transporter:add');
            
            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->transporterRepository->create($request->all());
    
            return redirect()
            ->route('admin.transporter.index')
            ->with('success', __('notification.create.success', ['model' => 'transporter']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.transporter.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'add transporter']));
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
            $this->authorize('transporter:read');

            $transporter = $this->transporterRepository->find($id);
    
            return view('transporter::transporter.show', compact('transporter'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.transporter.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'read transporter']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $this->authorize('transporter:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.transporter.update', $id),
                'method'    => 'PUT'
            ];
    
            $transporter = $this->transporterRepository->find($id);
    
            return view('transporter::transporter.edit', compact('form', 'transporter'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.transporter.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'edit transporter']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        try {
            $this->authorize('transporter:edit');

            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->transporterRepository->update($id, $request->all());
    
            return redirect()
            ->route('admin.transporter.index')
            ->with('success', __('notification.update.success', ['model' => 'transporter']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.transporter.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'edit transporter']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try {
            $this->authorize('transporter:delete');

            $this->transporterRepository->delete($id);
    
            return redirect()
            ->route('admin.transporter.index')
            ->with('success', __('notification.delete.success', ['model' => 'transporter']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.transporter.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'delete transporter']));
        }
    }
}
