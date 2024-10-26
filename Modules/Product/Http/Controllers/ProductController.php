<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Brand\Repositories\BrandRepository;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Tag\Repositories\TagRepository;

class ProductController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Brand\Repositories\BrandRepository */
    protected $brandRepository;

    /** @var \Modules\Category\Repositories\CategoryRepository */
    protected $categoryRepository;

    /** @var \Modules\Tag\Repositories\TagRepository */
    protected $tagRepository;

    /**
     * Create a new product controller instance.
     */
    public function __construct()
    {
        $this->productRepository = new ProductRepository();
        $this->categoryRepository = new CategoryRepository();
        $this->tagRepository = new TagRepository();
        $this->brandRepository = new BrandRepository();

        view()->share('menu', ['group' => 'product', 'active' => 'product']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('product:browse');

            $search   = $request->input('search');
            $products = $this->productRepository->paginate($search);

            return view('product::product.index', compact('products'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse product']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('product:add');
            
            $categories = $this->categoryRepository->getParents();
            $tags = $this->tagRepository->all();
            $brands = $this->brandRepository->all();
    
            $form = [
                'title'     => 'Create',
                'url'       => route('admin.product.store'),
                'method'    => 'POST',
            ];
    
            return view('product::product.create', compact('categories', 'tags', 'brands', 'form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.product.index')->with('danger', __('notification.permission.fail', ['action' => 'add product']));
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
            $this->authorize('product:add');

            $request->validate([
                'name'      => 'required',
                'price'     => 'required|numeric'
            ]);
    
            $this->productRepository->create($request->all());
    
            return redirect()->route('admin.product.index')->with('success', __('notification.create.success', ['model' => 'product']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'add product']));
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
            $this->authorize('product:read');
            $product = $this->productRepository->find($id);

            return view('product::product.show', compact('product'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.product.index')->with('danger', __('notification.permission.fail', ['action' => 'read product']));
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
            $this->authorize('product:edit');

            $categories = $this->categoryRepository->getParents();
            $tags = $this->tagRepository->all();
            $brands = $this->brandRepository->all();
    
            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.product.update', $id),
                'method'    => 'PUT',
            ];
    
            $product = $this->productRepository->find($id);
    
            return view('product::product.edit', compact('form', 'product', 'categories', 'tags', 'brands'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.product.index')->with('danger', __('notification.permission.fail', ['action' => 'edit product']));
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
            $this->authorize('product:edit');
    
            $request->validate([
                'name'      => 'required',
                'price'     => 'required|numeric'
            ]);
    
            $this->productRepository->update($id, $request->all());
    
            return redirect()->route('admin.product.index')->with('success', __('notification.update.success', ['model' => 'product']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.product.index')->with('danger', __('notification.permission.fail', ['action' => 'edit product']));
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
            $this->authorize('product:delete');
            $this->productRepository->delete($id);
    
            return redirect()->route('admin.product.index')->with('success', __('notification.delete.success', ['model' => 'product']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.product.index')->with('danger', __('notification.permission.fail', ['action' => 'delete product']));
        }
    }
}
