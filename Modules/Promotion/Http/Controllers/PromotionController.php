<?php

namespace Modules\Promotion\Http\Controllers;

use App\Enums\PromotionStatus;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Promotion\Repositories\PromotionRepository;

class PromotionController extends Controller
{
    
    /** @var \Modules\Promotion\Repositories\PromotionRepository */
    protected $promotionRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->promotionRepository = new PromotionRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'promotion']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $promotions = $this->promotionRepository->paginate($search);

        return view('promotion::promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('promotion.store'),
            'method'    => 'POST',
        ];

        return view('promotion::promotion.create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
        ]);

        $this->promotionRepository->create($request->all(), ['status' => PromotionStatus::PENDING]);

        return redirect()->route('promotion.index')->with('success', 'Create new promotion successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('promotion::show');
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
            'url'       => route('promotion.update', $id),
            'method'    => 'PUT',
        ];

        $promotion = $this->promotionRepository->find($id);

        return view('promotion::promotion.edit', compact('form', 'promotion'));
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
            'name'  => 'required'
        ]);

        $this->promotionRepository->update($id, $request->all());

        return redirect()->route('promotion.index')->with('success', 'Update promotion successfully');
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
