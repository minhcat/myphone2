<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;
use Modules\Attribute\Repositories\AttributeRepository;

class VariationController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variationRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Attribute\Repositories\AttributeRepository */
    protected $attributeRepository;

    /**
     * Create a new variation controller instance.
     */
    public function __construct()
    {
        $this->variationRepository = new VariationRepository();
        $this->productRepository = new ProductRepository();
        $this->attributeRepository = new AttributeRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'product']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($product_id)
    {
        try {
            $this->authorize('product_variation:browse');

            $variations = $this->variationRepository->paginateByProductId($product_id);
            $product = $this->productRepository->find($product_id);
            $product_name = $product->name ?: '';
            $attributes = $this->attributeRepository->all();
    
            return view('product::variation.index', compact('variations', 'attributes', 'product_id', 'product_name'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.index')
            ->with('danger', __('notification.permission.fail', ['action' => 'browse product variation']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request, $product_id)
    {
        try {
            $this->authorize('product_variation:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.product.variation.store', $product_id),
                'method'    => 'POST'
            ];
    
            $attributes = $this->attributeRepository->all();
    
            return view('product::variation.create', compact('form', 'product_id', 'attributes'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add product variation']));
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $product_id)
    {
        try {
            $this->authorize('product_variation:add');

            $request->validate([
                'code'      => 'required|unique:variations',
                'price'     => 'required|numeric'
            ]);
    
            $this->variationRepository->create($request->all());
    
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('success', __('notification.create.success', ['model' => 'product variation']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'add product variation']));
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($product_id, $id)
    {
        try {
            $this->authorize('product_variation:read');

            $variation = $this->variationRepository->find($id);
            $attributes = $this->attributeRepository->all();
    
            return view('product::variation.show', compact('variation', 'attributes', 'product_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'read product variation']));
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($product_id, $id)
    {
        try {
            $this->authorize('product_variation:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.product.variation.update', ['product_id' => $product_id, 'id' => $id]),
                'method'    => 'PUT'
            ];
            $variation = $this->variationRepository->find($id);
            $attributes = $this->attributeRepository->all();
    
            return view('product::variation.edit', compact('form', 'variation', 'attributes', 'product_id'));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit product variation']));
        }
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $product_id, $id)
    {
        try {
            $this->authorize('product_variation:edit');

            $request->validate([
                'code'      => 'required|unique:variations,code,'.$id,
                'price'     => 'required|numeric'
            ]);
    
            $this->variationRepository->update($id, $request->all());
    
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('success', __('notification.update.success', ['model' => 'product variation']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'edit product variation']));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($product_id, $id)
    {
        try {
            $this->authorize('product_variation:delete');
            $this->variationRepository->delete($id);
    
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('success', __('notification.delete.success', ['model' => 'product variation']));
        } catch (AuthorizationException $exception) {
            return redirect()
            ->route('admin.product.variation.index', $product_id)
            ->with('danger', __('notification.permission.fail', ['action' => 'delete product variation']));
        }
    }
}
