<?php

namespace Modules\Specification\Http\Controllers;

use App\Repositories\AbstractRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Specification\Repositories\InformationRepository;

class InformationController extends Controller
{
    /** @var \Modules\Specification\Repositories\InformationRepository */
    protected $informationRepository;

    /**
     * Create a new Information controller instance.
     */
    public function __construct()
    {
        $this->informationRepository = new InformationRepository();
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request, $specification_id)
    {
        $search = $request->input('search');
        $informations = $this->informationRepository->paginateBySpecificationId($specification_id, AbstractRepository::TAKE_DEFAULT, $search);

        return view('specification::informations.index', compact('informations', 'specification_id'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('specification::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('specification::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('specification::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
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
