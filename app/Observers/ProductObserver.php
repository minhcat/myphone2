<?php

namespace App\Observers;

use App\Enums\TargetType;
use Modules\Product\Entities\Product;
use Modules\Product\Repositories\VariationRepository;
use Modules\Sale\Repositories\SaleProductRepository;

class ProductObserver
{
    /** @var \Modules\Sale\Repositories\SaleProductRepository */
    protected $saleProductRepository;

    /** @var \Modules\Product\Repositories\VariationRepository */
    protected $variationRepository;

    /**
     * Create User Observer instance.
    */
    public function __construct()
    {
        $this->saleProductRepository = new SaleProductRepository;
        $this->variationRepository = new VariationRepository;
    }

    /**
     * Handle the user "deleted" event.
     *
     * @param  \Modules\Product\Entities\Product  $product
     * @return void
     */
    public function deleted(Product $product)
    {
        // remove sale products
        $variations = $this->variationRepository->getByProductId($product->id);
        foreach ($variations as $variation) {
            $this->saleProductRepository->deleteWhere(['target_type' => TargetType::VARIANT, 'target_id' => $variation->id]);
        }
        $this->saleProductRepository->deleteWhere(['target_type' => TargetType::PRODUCT, 'target_id' => $product->id]);

        // remove variations
        $this->variationRepository->deleteWhere(['product_id' => $product->id]);
    }
}
