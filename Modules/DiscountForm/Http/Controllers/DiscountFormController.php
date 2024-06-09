<?php

namespace Modules\DiscountForm\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\DiscountForm\Repositories\DiscountFormRepository;

class DiscountFormController extends Controller
{
    /** @var \Modules\DiscountForm\Repositories\DiscountFormRepository */
    protected $discountFormRepository;

    /**
     * Create new Discount Form Controller instance.
     */
    public function __construct()
    {
        $this->discountFormRepository = new DiscountFormRepository;

        view()->share('menu', ['group' => 'promotion', 'active' => 'discount_form']);
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $discount_forms = $this->discountFormRepository->paginate($search);

        return view('discountform::index', compact('discount_forms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('discountform::create');
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
        return view('discountform::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('discountform::edit');
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
