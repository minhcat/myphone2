<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Category\Repositories\CategoryRepository */
    protected $categoryRepository;

    /**
     * Create new category Controller instance.
     */
    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository;

        view()->share('menu', ['group' => 'category', 'active' => 'category']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        try {
            $this->authorize('category:browse');

            $search = $request->input('search');
            $categories = $this->categoryRepository->paginate($search);
    
            return view('category::index', compact('categories'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse category']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('category:add');

            $form = [
                'title'     => 'Create',
                'url'       => route('admin.category.store'),
                'method'    => 'POST',
            ];
    
            return view('category::create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'add category']));
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
            $this->authorize('category:add');

            $request->validate([
                'name'  => 'required|unique:categories'
            ]);
    
            $this->categoryRepository->create($request->all());
    
            return redirect()->route('admin.category.index')->with('success', __('notification.create.success', ['model' => 'category']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'add category']));
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
            $this->authorize('category:read');
            
            $category = $this->categoryRepository->find($id);
    
            return view('category::show', compact('category'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'read category']));
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
            $this->authorize('category:edit');

            $form = [
                'title'     => 'Edit',
                'url'       => route('admin.category.update', $id),
                'method'    => 'PUT'
            ];
    
            $category = $this->categoryRepository->find($id);
    
            return view('category::edit', compact('form', 'category'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'edit category']));
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
            $this->authorize('category:edit');

            $request->validate([
                'name'  => 'required|unique:categories,name,'.$id
            ]);
    
            $this->categoryRepository->update($id, $request->all());
    
            return redirect()->route('admin.category.index')->with('success', __('notification.update.success', ['model' => 'category']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'edit category']));
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
            $this->authorize('category:delete');

            $this->categoryRepository->delete($id);
    
            return redirect()->route('admin.category.index')->with('success', __('notification.delete.success', ['model' => 'category']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'delete category']));
        }
    }

    /**
     * Show the system for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function builder()
    {
        try {
            $this->authorize('category:edit');

            $categories = $this->categoryRepository->getParents();
    
            return view('category::builder', compact('categories'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'edit category']));
        }
    }

    /**
     * Update the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function build(Request $request) 
    {
        try {
            $this->authorize('category:edit');

            $request->validate([
                'categories'    => 'required',
            ]);
    
            $categories = json_decode($request->input('categories'));
    
            $this->categoryRepository->order($categories);
    
            return response()->json([
                'type'      => 'Success',
                'message'   => __('notification.build.success', ['model' => 'category'])
            ]);
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.category.index')->with('danger', __('notification.permission.fail', ['action' => 'edit category']));
        }
    }
}
