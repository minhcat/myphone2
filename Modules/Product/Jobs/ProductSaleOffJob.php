<?php

namespace Modules\Product\Jobs;

use App\Enums\PromotionStatus;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Product\Entities\Variation;
use Modules\Sale\Entities\Sale;
use Modules\Tag\Entities\Tag;

class ProductSaleOffJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sale;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->sale->status !== PromotionStatus::INPROGRESS) {
            return;
        }

        $saleTag = Tag::where('name', 'sale off')->first();
        $saleProducts = $this->sale->saleproducts;

        foreach ($saleProducts as $saleProduct) {
            $target = $saleProduct->target;
            if ($target instanceof Variation) {
                $product = $target->product;
                if (!$product->tags->contains($saleTag->id)) {
                    $product->tags()->attach($saleTag->id);
                }
            } else {
                if (!$target->tags->contains($saleTag->id)) {
                    $target->tags()->attach($saleTag->id);
                }
            }
        }
    }
}
