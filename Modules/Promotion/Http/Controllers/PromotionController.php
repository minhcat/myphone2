<?php

namespace Modules\Promotion\Http\Controllers;

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
        return view('promotion::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
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
        return view('promotion::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
