<?php

namespace Modules\Specification\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Specification\Repositories\InformationRepository;

class InformationController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Specification\Repositories\InformationRepository */
    protected $informationRepository;

    /**
     * Create a new information controller instance.
     */
    public function __construct()
    {
        $this->informationRepository = new InformationRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'specification']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $specification_id)
    {
        try {
            $this->authorize('information:browse');

            $search = $request->input('search');
            $informations = $this->informationRepository->paginateBySpecificationId($specification_id, $search);
    
            return view('specification::information.index', compact('informations', 'specification_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse information']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($specification_id)
    {
        try {
            $this->authorize('information:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.specification.information.store', $specification_id),
                'method'    => 'POST',
            ];
    
            return view('specification::information.create', compact('form', 'specification_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.information.index', $specification_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add information']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $specification_id)
    {
        try {
            $this->authorize('information:add');

            $request->validate([
                'value'     => 'required'
            ]);
    
            $this->informationRepository->create($request->all(), ['specification_id' => $specification_id]);
    
            return redirect()->route('admin.specification.information.index', $specification_id)->with('success', __('notification.create.success', ['model' => 'information']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.information.index', $specification_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add information']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($specification_id, $id)
    {
        try {
            $this->authorize('information:read');

            $information = $this->informationRepository->find($id);
    
            return view('specification::information.show', compact('information', 'specification_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.information.index', $specification_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'read information']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($specification_id, $id)
    {
        try {
            $this->authorize('information:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.specification.information.update', ['specification_id' => $specification_id, 'id' => $id]),
                'method'    => 'PUT',
            ];
    
            $information = $this->informationRepository->find($id);
    
            return view('specification::information.edit', compact('form', 'information', 'specification_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.information.index', $specification_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit information']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $specification_id, $id)
    {
        try {
            $this->authorize('information:edit');

            $request->validate([
                'value'     => 'required',
            ]);
    
            $this->informationRepository->update($id, $request->all(), ['specification_id' => $specification_id]);
    
            return redirect()->route('admin.specification.information.index', $specification_id)->with('success', __('notification.update.success', ['model' => 'information']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.information.index', $specification_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit information']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($specification_id, $id)
    {
        try {
            $this->authorize('information:delete');

            $this->informationRepository->delete($id);
    
            return redirect()->route('admin.specification.information.index', $specification_id)->with('success', __('notification.delete.success', ['model' => 'information']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.specification.information.index', $specification_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete information']));
        }
    }
}
