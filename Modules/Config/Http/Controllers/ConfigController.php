<?php

namespace Modules\Config\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Config\Repositories\ConfigRepository;

class ConfigController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Config\Repositories\ConfigRepository */
    protected $configRepository;

    /**
     * Create new category Controller instance.
     */
    public function __construct()
    {
        $this->configRepository = new ConfigRepository;

        view()->share('menu', ['group' => 'config', 'active' => 'config']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('config:browse');

            $search = $request->input('search');
            $configs = $this->configRepository->paginate($search);
    
            return view('config::index', compact('configs'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse config']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('config:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.config.store'),
                'method'    => 'POST',
            ];
    
            return view('config::create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'add config']));
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
            $this->authorize('config:add');

            $request->validate([
                'name'  => 'required|unique:configs',
            ]);
    
            $this->configRepository->create($request->all());
    
            return redirect()->route('admin.config.index')->with('success', __('notification.create.success', ['model' => 'config']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'add config']));
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
            $this->authorize('config:read');

            $config = $this->configRepository->find($id);
    
            return view('config::show', compact('config'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'read config']));
        }
        return view('config::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        try {
            $this->authorize('config:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.config.update', $id),
                'method'    => 'PUT',
            ];
    
            $config = $this->configRepository->find($id);
    
            return view('config::edit', compact('form', 'config'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'edit config']));
        }
        return view('config::edit');
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
            $this->authorize('config:edit');

            $request->validate([
                'name'  => 'required|unique:configs,name,'.$id,
            ]);
    
            $this->configRepository->update($id, $request->all());
    
            return redirect()->route('admin.config.index')->with('success', __('notification.update.success', ['model' => 'config']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'edit config']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @return Renderable
     */
    public function reset($id)
    {
        try {
            $this->authorize('config:edit');
    
            $this->configRepository->reset($id);
    
            return redirect()->route('admin.config.index')->with('success', __('notification.reset.success', ['model' => 'config']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'edit config']));
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
            $this->authorize('config:delete');

            $this->configRepository->delete($id);
    
            return redirect()->route('admin.config.index')->with('success', __('notification.delete.success', ['model' => 'config']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.config.index')->with('danger', __('notification.permission.fail', ['action' => 'delete config']));
        }
    }
}
