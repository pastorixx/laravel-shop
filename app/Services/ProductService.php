<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * Get product list.
     *
     * @param  array $filters
     * @return array
     */
    public function getList(array $filters): Collection
    {
        $products = Product::select([
            'id',
            'name',
            'price',
            'description'
        ])->get();

        // Filtering can be added here to search for specific products..

        return $products;
    }
}
