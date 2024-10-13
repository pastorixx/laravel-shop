<?php

namespace App\Services;

use App\Exceptions\DefaultException;
use App\Models\Purchase;
use Illuminate\Database\Eloquent\Collection;

class PurchaseService
{
    /**
     * Get purchases list.
     *
     * @param  array $filters
     * @return array
     */
    public function getList(array $filters): Collection
    {
        $products = Purchase::select([
            'purchases.id',
            // 'purchases.type',
            'purchases.price',
            'products.name',
            'products.description',
            'purchases.created_at',
            'purchases.expires_at',
        ])
            ->join('products', 'products.id', '=', 'purchases.product_id')
            ->get();

        // Filtering can be added here to search for specific purchases..

        return $products;
    }

    /**
     * Get purchase and generate token.
     *
     * @param  array $filters
     * @return array
     */
    public function get(Purchase $purchase): Purchase
    {
        if ($purchase->is_expired) {
            throw new DefaultException('The rental period for this product has expired!');
        }

        if ($purchase->token) {
            return $purchase;
        }

        $purchase->update([
            'token' => uniqid(),
        ]);

        return $purchase;
    }
}
