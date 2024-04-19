<?php

namespace Modules\Cart\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Repositories\CartRepository;

class CartController extends Controller
{
    /** @var \Module\Cart\Repositories\CartRepository */
    protected $cartRepository;

    /**
     * Create new Cart Controller instance.
     */
    public function __construct()
    {
        $this->cartRepository = new CartRepository;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $carts  = $this->cartRepository->paginate($search);
        $menu = ['group' => 'invoice', 'active' => 'cart'];

        return view('cart::carts.index', compact('carts', 'menu'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $cart = $this->cartRepository->find($id);
        $menu = ['group' => 'invoice', 'active' => 'cart'];

        return view('cart::carts.detail', compact('cart', 'menu'));
    }
}
