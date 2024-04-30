<?php

namespace Modules\Category\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /** @var \Modules\Category\Repositories\CategoryRepository */
    protected $categoryRepository;

    /**
     * Create new Brand Controller instance.
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
        $search = $request->input('search');
        $categories = $this->categoryRepository->paginate($search);

        return view('category::index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('category.store'),
            'method'    => 'POST',
        ];

        return view('category::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|unique:categories'
        ]);

        $this->categoryRepository->create($request->all());

        return redirect()->route('category.index')->with('success', 'create new category successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $category = $this->categoryRepository->find($id);

        return view('category::detail', compact('category'));
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
            'url'       => route('category.update', $id),
            'method'    => 'PUT'
        ];

        $category = $this->categoryRepository->find($id);

        return view('category::edit', compact('form', 'category'));
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
            'name'  => 'required|unique:categories,name,'.$id
        ]);

        $this->categoryRepository->update($id, $request->all());

        return redirect()->route('category.index')->with('success', 'update category successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return redirect()->route('category.index')->with('success', 'delete category successfully');
    }

    /**
     * Show the system for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function builder()
    {
        $categories = $this->categoryRepository->getParents();

        return view('category::builder', compact('categories'));
    }

    /**
     * Update the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function build(Request $request) 
    {
        $request->validate([
            'categories'    => 'required',
        ]);

        $categories = json_decode($request->input('categories'));

        $this->categoryRepository->order($categories);

        return response()->json([
            'type'      => 'Success',
            'message'   => 'buid categories successfully'   
        ]);
    }
}
