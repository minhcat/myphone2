<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Repositories\TagRepository;

class TagController extends Controller
{
    /** @var \Modules\Specification\Repositories\InformationRepository */
    protected $tagRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->tagRepository = new TagRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tags = $this->tagRepository->paginate($search);
        $menu = ['group' => 'category', 'active' => 'tag'];

        return view('tag::index', compact('tags', 'menu'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'url'       => route('tag.store'),
            'method'    => 'POST',
            'title'     => 'Create'
        ];
        $menu = [
            'group'     => 'category',
            'active'    => 'tag'
        ];

        return view('tag::create', compact('form', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required',
        ]);

        $this->tagRepository->create($request->all());

        return redirect()->route('tag.index')->with('success', 'Create new tag successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $tag = $this->tagRepository->find($id);
        $menu = ['group' => 'category', 'active' => 'tag'];

        return view('tag::detail', compact('tag', 'menu'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'url'       => route('tag.update', $id),
            'method'    => 'PUT',
            'title'     => 'Edit'
        ];
        $menu = [
            'group'     => 'category',
            'active'    => 'tag'
        ];
        $tag = $this->tagRepository->find($id);

        return view('tag::edit', compact('tag', 'form', 'menu'));
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

        $this->tagRepository->update($id, $request->all());

        return redirect()->route('tag.index')->with('success', 'Edit tag successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->tagRepository->delete($id);

        return redirect()->route('tag.index')->with('success', 'Delete tag successfully');
    }
}
