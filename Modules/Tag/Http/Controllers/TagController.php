<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Repositories\TagRepository;

class TagController extends Controller
{
    /** @var \Modules\Specification\Repositories\InformationRepository */   // todo: update true repository
    protected $tagRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->tagRepository = new TagRepository();

        view()->share('menu', ['group' => 'category', 'active' => 'tag']);
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tags = $this->tagRepository->paginate($search);

        return view('tag::index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'url'       => route('admin.tag.store'),
            'method'    => 'POST',
            'title'     => 'Create'
        ];

        return view('tag::create', compact('form'));
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

        return redirect()->route('admin.tag.index')->with('success', __('notification.create.success', ['model' => 'tag']));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $tag = $this->tagRepository->find($id);

        return view('tag::detail', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'url'       => route('admin.tag.update', $id),
            'method'    => 'PUT',
            'title'     => 'Edit'
        ];
        $tag = $this->tagRepository->find($id);

        return view('tag::edit', compact('tag', 'form'));
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

        return redirect()->route('admin.tag.index')->with('success', __('notification.update.success', ['model' => 'tag']));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->tagRepository->delete($id);

        return redirect()->route('admin.tag.index')->with('success', __('notification.delete.success', ['model' => 'tag']));
    }
}
