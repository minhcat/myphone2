<?php

namespace Modules\Gift\Http\Controllers;

use App\Enums\PromotionStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gift\Repositories\GiftRepository;

class GiftController extends Controller
{
    /** @var \Modules\Gift\Repositories\GiftRepository */
    protected $giftRepository;

    /**
     * Create a new Product controller instance.
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
        $search = $request->input('search');
        $gifts = $this->giftRepository->paginate($search);

        return view('gift::gift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('admin.gift.store'),
            'method'    => 'POST',
        ];

        return view('gift::gift.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required'
        ]);

        $this->giftRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);

        return redirect()->route('admin.gift.index')->with('success', __('notification.create.success', ['model' => 'gift']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('gift::show');
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
            'url'       => route('admin.gift.update', $id),
            'method'    => 'PUT',
        ];
        $gift = $this->giftRepository->find($id);

        return view('gift::gift.edit', compact('form', 'gift'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->giftRepository->update($id, $request->all());

        return redirect()->route('admin.gift.index')->with('success', __('notification.update.success', ['model' => 'gift']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
