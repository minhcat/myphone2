<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Tag\Repositories\TagRepository;

class TagController extends Controller
{
    use AuthorizesRequests;

    /** @var \Modules\Tag\Repositories\TagRepository */
    protected $tagRepository;

    /**
     * Create a new tag controller instance.
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
        try {
            $this->authorize('tag:browse');

            $search = $request->input('search');
            $tags = $this->tagRepository->paginate($search);
    
            return view('tag::index', compact('tags'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin')->with('danger', __('notification.permission.fail', ['action' => 'browse tag']));
        }
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        try {
            $this->authorize('tag:add');

            $form = [
                'url'       => route('admin.tag.store'),
                'method'    => 'POST',
                'title'     => 'Create'
            ];
    
            return view('tag::create', compact('form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.tag.index')->with('danger', __('notification.permission.fail', ['action' => 'add tag']));
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
            $this->authorize('tag:add');

            $request->validate([
                'name'  => 'required',
            ]);
    
            $this->tagRepository->create($request->all());
    
            return redirect()->route('admin.tag.index')->with('success', __('notification.create.success', ['model' => 'tag']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.tag.index')->with('danger', __('notification.permission.fail', ['action' => 'add tag']));
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
            $this->authorize('tag:read');

            $tag = $this->tagRepository->find($id);
    
            return view('tag::show', compact('tag'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.tag.index')->with('danger', __('notification.permission.fail', ['action' => 'read tag']));
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
            $this->authorize('tag:edit');

            $form = [
                'url'       => route('admin.tag.update', $id),
                'method'    => 'PUT',
                'title'     => 'Edit'
            ];
            $tag = $this->tagRepository->find($id);
    
            return view('tag::edit', compact('tag', 'form'));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.tag.index')->with('danger', __('notification.permission.fail', ['action' => 'edit tag']));
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
            $this->authorize('tag:edit');

            $request->validate([
                'name'  => 'required'
            ]);
    
            $this->tagRepository->update($id, $request->all());
    
            return redirect()->route('admin.tag.index')->with('success', __('notification.update.success', ['model' => 'tag']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.tag.index')->with('danger', __('notification.permission.fail', ['action' => 'edit tag']));
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
            $this->authorize('tag:delete');

            $this->tagRepository->delete($id);
    
            return redirect()->route('admin.tag.index')->with('success', __('notification.delete.success', ['model' => 'tag']));
        } catch (AuthorizationException $exception) {
            return redirect()->route('admin.tag.index')->with('danger', __('notification.permission.fail', ['action' => 'delete tag']));
        }
    }
}
