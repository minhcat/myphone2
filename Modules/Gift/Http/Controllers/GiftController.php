<?php

namespace Modules\Gift\Http\Controllers;

use App\Enums\PromotionStatus;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gift\Repositories\GiftRepository;

class GiftController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Gift\Repositories\GiftRepository */
    protected $giftRepository;

    /**
     * Create a new gift controller instance.
     */
    public function __construct()
    {
        $this->giftRepository = new GiftRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'gift']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('gift:browse');

            $search = $request->input('search');
            $gifts = $this->giftRepository->paginate($search);
    
            return view('gift::gift.index', compact('gifts'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse gift']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('gift:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.gift.store'),
                'method'    => 'POST',
            ];
    
            return view('gift::gift.create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'add gift']));
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
            $this->authorize('gift:add');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->giftRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);
    
            return redirect()->route('admin.gift.index')->with('success', __('notification.create.success', ['model' => 'gift']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'add gift']));
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
            $this->authorize('gift:read');

            $gift = $this->giftRepository->find($id);
    
            return view('gift::gift.show', compact('gift'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'read gift']));
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
            $this->authorize('gift:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.gift.update', $id),
                'method'    => 'PUT',
            ];
            $gift = $this->giftRepository->find($id);
    
            return view('gift::gift.edit', compact('form', 'gift'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'edit gift']));
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
            $this->authorize('gift:edit');

            $this->giftRepository->update($id, $request->all());
    
            return redirect()->route('admin.gift.index')->with('success', __('notification.update.success', ['model' => 'gift']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'edit gift']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function updateStatus(Request $request, $id)
    {
        try {
            $this->authorize('gift:edit');

            $request->validate([
                'status'    => 'required'
            ]);

            $this->giftRepository->update($id, $request->only('status'));
    
            return redirect()->route('admin.gift.index')->with('success', __('notification.update.success', ['model' => 'gift']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'edit gift']));
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
            $this->authorize('gift:delete');

            $this->giftRepository->delete($id);
    
            return redirect()->route('admin.gift.index')->with('sucess', __('notification.delete.success', ['model' => 'gift']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.gift.index')->with('danger', __('notification.permission.fail', ['action' => 'delete gift']));
        }
    }
}
