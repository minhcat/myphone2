<?php

namespace Modules\Gift\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Gift\Repositories\GiftProductRepository;

class GiftProductController extends Controller
{
    /** @var \Modules\Gift\Repositories\GiftProductRepository */
    protected $giftProductRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->giftProductRepository = new GiftProductRepository();

        view()->share('menu', ['group' => 'promotion', 'active' => 'gift']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($gift_id)
    {
        $gift_products = $this->giftProductRepository->paginateByGiftId($gift_id);

        return view('gift::product.index', compact('gift_products', 'gift_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('gift::create');
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
        return view('gift::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('gift::edit');
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
