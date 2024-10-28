<?php

namespace Modules\Attribute\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Repositories\AttributeRepository;
use Modules\Attribute\Repositories\OptionRepository;

class AttributeController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Attribute\Repositories\AttributeRepository */
    protected $attributeRepository;

    /** @var \Modules\Attribute\Repositories\OptionRepository */
    protected $optionRepository;

    /**
     * Create a new Attribute controller instance.
     */
    public function __construct()
    {
        $this->attributeRepository = new AttributeRepository();
        $this->optionRepository = new OptionRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'attribute']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('attribute:browse');

            $search = $request->input('search');
            $attributes = $this->attributeRepository->paginate($search);
    
            return view('attribute::attribute.index', compact('attributes'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse attribute']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('attribute:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.attribute.store'),
                'method'    => 'POST',
            ];
    
            return view('attribute::attribute.create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.attribute.index')->with('danger', __('notification.permission.fail', ['action' => 'add attribute']));
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
            $this->authorize('attribute:add');

            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->attributeRepository->create($request->all());
    
            return redirect()->route('admin.attribute.index')->with('success', __('notification.create.success', ['model' => 'attribute']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.attribute.index')->with('danger', __('notification.permission.fail', ['action' => 'add attribute']));
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
            $this->authorize('attribute:read');

            $attribute = $this->attributeRepository->find($id);
    
            return view('attribute::attribute.show', compact('attribute'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.attribute.index')->with('danger', __('notification.permission.fail', ['action' => 'read attribute']));
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
            $this->authorize('attribute:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.attribute.update', $id),
                'method'    => 'PUT',
            ];
    
            $attribute = $this->attributeRepository->find($id);
    
            return view('attribute::attribute.edit', compact('form', 'attribute'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.attribute.index')->with('danger', __('notification.permission.fail', ['action' => 'edit attribute']));
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
            $this->authorize('attribute:edit');

            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->attributeRepository->update($id, $request->all());
    
            return redirect()->route('admin.attribute.index')->with('success', __('notification.update.success', ['model' => 'attribute']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.attribute.index')->with('danger', __('notification.permission.fail', ['action' => 'edit attribute']));
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
            $this->authorize('attribute:delete');

            $this->attributeRepository->delete($id);
    
            $this->optionRepository->deleteByAttributeId($id);
    
            return redirect()->route('admin.attribute.index')->with('success', __('notification.delete.success', ['model' => 'attribute']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.attribute.index')->with('danger', __('notification.permission.fail', ['action' => 'delete attribute']));
        }
    }
}
