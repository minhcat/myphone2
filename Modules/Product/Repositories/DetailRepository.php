<?php

namespace Modules\Product\Repositories;

use App\Repositories\AbstractRepository;
use Modules\Product\Entities\Detail;

class DetailRepository extends AbstractRepository
{
    function getModel()
    {
        return new Detail();
    }

    public function findByProductId($id)
    {
        return $this->model->where('product_id', $id)->get();
    }

    public function updateWithProductId($product_id, $data)
    {
        $this->model->where('product_id', $product_id)->delete();

        $details = [];

        foreach ($data['information'] as $key => $item) {
            $details[] = [
                'product_id'        => $product_id,
                'specification_id'  => $data['specification'][$key],
                'information_id'    => $item,
                'author_id'         => 1, // todo: use Auth::user->id
                'created_at'        => now()->format('Y-m-d H:i:s'),
                'updated_at'        => now()->format('Y-m-d H:i:s'),
            ];
        }

        $this->model->insert($details);
    }
}
