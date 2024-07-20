<?php

namespace Modules\Transporter\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Transporter\Repositories\TransporterRepository;

class TransporterController extends Controller
{
    /** @var \Modules\Transporter\Repositories\TransporterRepository */
    protected $transporterRepository;

    /**
     * Create a new Information controller instance.
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
        $search = $request->input('search');
        $transporters = $this->transporterRepository->paginate($search);

        return view('transporter::transporter.index', compact('transporters'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.transporter.store'),
            'method'    => 'POST'
        ];

        return view('transporter::transporter.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);

        $this->transporterRepository->create($request->all());

        return redirect()->route('admin.transporter.index')->with('success', __('notification.create.success', ['model' => 'transporter']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $transporter = $this->transporterRepository->find($id);

        return view('transporter::transporter.detail', compact('transporter'));
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
            'url'       => route('admin.transporter.update', $id),
            'method'    => 'PUT'
        ];

        $transporter = $this->transporterRepository->find($id);

        return view('transporter::transporter.edit', compact('form', 'transporter'));
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
            'name'  => 'required',
        ]);

        $this->transporterRepository->update($id, $request->all());

        return redirect()->route('admin.transporter.index')->with('success', __('notification.update.success', ['model' => 'transporter']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->transporterRepository->delete($id);

        return redirect()->route('admin.transporter.index')->with('success', __('notification.delete.success', ['model' => 'transporter']));
    }
}
