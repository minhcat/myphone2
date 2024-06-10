<?php

namespace Modules\DiscountForm\Http\Controllers;

use App\Enums\DiscountTarget;
use App\Enums\DiscountType;
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
        $form = [
            'title'     => 'Create',
            'url'       => route('discount_form.store'),
            'method'    => 'POST',
        ];
        $discount_types = DiscountType::getObject();
        $target_types = DiscountTarget::getObject();

        return view('discountform::create', compact('form', 'discount_types', 'target_types'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'              => 'required|unique:discount_forms',
            'name'              => 'required|unique:discount_forms',
            'target_type'       => 'required',
            'discount_type'     => 'required',
            'discount_value'    => 'required'
        ]);

        $this->discountFormRepository->create($request->all());

        return redirect()->route('discount_form.index')->with('success', 'Create new discount form successfully');
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
        $form = [
            'title'     => 'Update',
            'url'       => route('discount_form.update', $id),
            'method'    => 'PUT',
        ];
        $discount_types = DiscountType::getObject();
        $target_types = DiscountTarget::getObject();
        $discount_form = $this->discountFormRepository->find($id);

        return view('discountform::edit', compact('form', 'discount_form', 'discount_types', 'target_types'));
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
            'code'  => 'unique:discount_forms,code,'.$id,
            'name'  => 'unique:discount_forms,name,'.$id
        ]);

        $this->discountFormRepository->update($id, $request->all());

        return redirect()->route('discount_form.index')->with('success', 'Update discount form successfully');
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
