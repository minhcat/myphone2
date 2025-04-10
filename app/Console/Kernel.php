<?php

namespace App\Console;

use App\Enums\PromotionStatus;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Variation;
use Modules\Sale\Entities\Sale;
use Modules\Tag\Entities\Tag;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call($this->scheduleRemoveSaleOffTagInProduct())->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected function scheduleRemoveSaleOffTagInProduct()
    {
        return function() {
            $inprogressSales = Sale::where('status', PromotionStatus::INPROGRESS)->get();
            $productIds = [];
            foreach ($inprogressSales as $sale) {
                $saleProducts = $sale->saleproducts;
                
                foreach ($saleProducts as $saleProduct) {
                    $target = $saleProduct->target;
                    if ($target instanceof Variation) {
                        $product = $target->product;
                    } else {
                        $product = $target;
                    }
                    $productIds[] = $product->id;
                }
            }
            
            $saleProducts = Product::whereNotIn('id', $productIds)->whereHas('tags', function($query) {
                return $query->where('name', 'sale off');
            })->get();
    
            $saleTag = Tag::where('name', 'sale off')->first();
            foreach ($saleProducts as $product) {
                $product->tags()->detach($saleTag->id);
            }
        };
    }
}
