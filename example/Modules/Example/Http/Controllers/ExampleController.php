<?php

namespace Modules\Example\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Example\Repositories\ExampleRepository;

class ExampleController extends Controller
{
    /** @var \App\Repositories\AbstractRepository */
    protected $exampleRepository;

    /**
     * Create a new Product controller instance.
     */
    public function __construct()
    {
        $this->exampleRepository = new ExampleRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $search   = $request->input('search');
        $take     = $request->input('take') ?? AbstractRepository::TAKE_DEFAULT;
        $page     = $request->input('page') ?? AbstractRepository::PAGE_DEFAULT;
        $examples = $this->exampleRepository->paginate($take, $search);
        $total    = $examples->total();
        $start    = ($page - 1) * $take + 1;
        $end      = min($page * $take, $examples->total());

        return view('example::index', compact('examples', 'total', 'take', 'page', 'start', 'end'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('example.store'),
            'method'    => 'POST',
        ];

        return view('example::create', compact('form'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $this->exampleRepository->create($request->all());

        return redirect()->route('example.index')->with('success', 'create new example successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $example = $this->exampleRepository->find($id);

        return view('example::detail', compact('example'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('example.update', $id),
            'method'    => 'PUT',
        ];

        $example = $this->exampleRepository->find($id);

        return view('example::edit', compact('form', 'example'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $this->exampleRepository->update($id, $request->all());

        return redirect()->route('example.index')->with('success', 'update example successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->exampleRepository->delete($id);

        return redirect()->route('example.index')->with('success', 'delete example successfully');
    }
}
