<?php

namespace Modules\Condition\Http\Controllers;

use App\Enums\ConditionTargetType;
use App\Enums\ConditionType;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Repositories\CategoryRepository;
use Modules\Condition\Entities\Condition;
use Modules\Condition\Repositories\ConditionRepository;
use Modules\Condition\Repositories\ConditionTargetRepository;
use Modules\Product\Repositories\ProductRepository;
use Modules\Product\Repositories\VariationRepository;
use Modules\Tag\Repositories\TagRepository;

class ConditionTargetController extends Controller
{
    /** @var \Modules\Condition\Repositories\ConditionTargetRepository */
    protected $conditionTargetRepository;

    /** @var \Modules\Condition\Repositories\ConditionRepository */
    protected $conditionRepository;

    /** @var \Modules\Product\Repositories\ProductRepository */
    protected $productRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variationRepository;

    /** @var \Modules\Category\Repositories\CategoryRepository */
    protected $categoryRepository;
    
    /** @var \Modules\Tag\Repositories\TagRepository */
    protected $tagRepository;

    /**
     * Create new Condition Controller instance.
     */
    public function __construct()
    {
        $this->conditionTargetRepository = new ConditionTargetRepository;
        $this->productRepository = new ProductRepository;
        $this->variationRepository = new VariationRepository;
        $this->categoryRepository = new CategoryRepository;
        $this->tagRepository = new TagRepository;
        $this->conditionRepository = new ConditionRepository;

        view()->share('menu', ['group' => 'promotion', 'active' => 'condition']);
    }
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($condition_id, Request $request)
    {
        $search = $request->input('search');
        $targets = $this->conditionTargetRepository->paginateByConditionId($condition_id, $search);

        return view('condition::target.index', compact('condition_id', 'targets'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($condition_id)
    {
        $form = [
            'title'     => 'Create',
            'url'       => route('condition.target.store', $condition_id),
            'method'    => 'POST',
        ];
        [$target_types, $target_type_select, $products, $targets, $variations, $categories, $tags] = $this->generateDataForm($condition_id);

        return view('condition::target.create', compact('form', 'condition_id', 'target_types', 'target_type_select', 'products', 'targets', 'variations', 'categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $condition_id)
    {
        $request->validate([
            'code'  => 'required|unique:condition_targets'
        ]);

        $this->conditionTargetRepository->create($request->all(), ['condition_id' => $condition_id]);

        return redirect()->route('condition.target.index', $condition_id)->with('success', 'Create new target successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($condition_id, $id)
    {
        $target = $this->conditionTargetRepository->find($id);

        return view('condition::target.detail', compact('condition_id', 'target'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($condition_id, $id)
    {
        $form = [
            'title'     => 'Edit',
            'url'       => route('condition.target.update', ['condition_id' => $condition_id, 'id' => $id]),
            'method'    => 'PUT',
        ];
        [$target_types, $target_type_select, $products, $targets, $variations, $categories, $tags] = $this->generateDataForm($condition_id);
        $target = $this->conditionTargetRepository->find($id);

        return view('condition::target.edit', compact('form', 'condition_id', 'target', 'target_type_select', 'target_types', 'products', 'targets', 'variations', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $condition_id, $id)
    {
        $request->validate([
            'code'  => 'unique:condition_targets,code,'.$id
        ]);

        $this->conditionTargetRepository->update($id, $request->all());

        return redirect()->route('condition.target.index', $condition_id)->with('success', 'Update condition target successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($condition_id, $id)
    {
        $this->conditionTargetRepository->delete($id);

        return redirect()->route('condition.target.index', $condition_id)->with('success', 'Delete condition target successfully');
    }

    private function filterTargetType($condition_type)
    {
        switch ($condition_type) {
            case ConditionType::PRODUCT: 
                return [
                    ConditionTargetType::VARIANT,
                    ConditionTargetType::PRODUCT
                ];
            case ConditionType::PRODUCT_GROUP: 
                return [
                    ConditionTargetType::PRODUCT_GROUP,
                ];
            case ConditionType::CATEGORY:
                return [
                    ConditionTargetType::CATEGORY,
                ];
            case ConditionTargetType::TAG:
                return [
                    ConditionTargetType::TAG
                ];
        }
    }

    private function generateDataForm($condition_id)
    {
        $target_type_select = $this->conditionRepository->find($condition_id)->type;
        $target_types = ConditionTargetType::getObject($this->filterTargetType($target_type_select));
        $products = $this->productRepository->all();
        $variations = $this->variationRepository->all();
        $categories = $this->categoryRepository->all();
        $tags = $this->tagRepository->all();
        $targets = $this->conditionTargetRepository->getParents();

        return [$target_types, $target_type_select, $products, $targets, $variations, $categories, $tags];
    }
}
