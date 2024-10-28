<?php

namespace Modules\Attribute\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Attribute\Repositories\OptionRepository;

class OptionController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Attribute\Repositories\OptionRepository */
    protected $optionRepository;

    /**
     * Create a new option controller instance.
     */
    public function __construct()
    {
        $this->optionRepository = new OptionRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'attribute']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $attribute_id)
    {
        try {
            $this->authorize('attribute_option:browse');

            $search = $request->input('search');
            $options = $this->optionRepository->paginateByAttributeId($attribute_id, $search);
    
            return view('attribute::option.index', compact('options', 'attribute_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse attribute option']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($attribute_id)
    {
        try {
            $this->authorize('attribute_option:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.attribute.option.store', $attribute_id),
                'method'    => 'POST',
            ];
    
            return view('attribute::option.create', compact('form', 'attribute_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add attribute option']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $attribute_id)
    {
        try {
            $this->authorize('attribute_option:add');

            $request->validate([
                'value' => 'required|unique:options'
            ]);
    
            $this->optionRepository->create($request->all(), ['attribute_id' => $attribute_id]);
    
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('success', __('notification.create.success', ['model' => 'option']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add attribute option']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($attribute_id, $id)
    {
        try {
            $this->authorize('attribute_option:read');

            $option = $this->optionRepository->find($id);
    
            return view('attribute::option.show', compact('option', 'attribute_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'read attribute option']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($attribute_id, $id)
    {
        try {
            $this->authorize('attribute_option:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.attribute.option.update', ['attribute_id' => $attribute_id, 'id' => $id]),
                'method'    => 'PUT',
            ];

            $option = $this->optionRepository->find($id);

            return view('attribute::option.edit', compact('form', 'option', 'attribute_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit attribute option']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $attribute_id, $id)
    {
        try {
            $this->authorize('attribute_option:edit');

            $request->validate([
                'value' => 'required|unique:options,value,'.$id
            ]);

            $this->optionRepository->update($id, $request->all(), ['attribute_id' => $attribute_id]);

            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('success', __('notification.update.success', ['model' => 'option']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit attribute option']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($attribute_id, $id)
    {
        try {
            $this->authorize('attribute_option:delete');

            $this->optionRepository->delete($id);
    
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('success', __('notification.delete.success', ['model' => 'option']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.attribute.option.index', $attribute_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete attribute option']));
        }
    }
}
