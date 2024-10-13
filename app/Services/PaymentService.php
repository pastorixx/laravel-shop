<?php

namespace App\Services;

use App\Enums\PurchaseTypes;
use App\Exceptions\DefaultException;
use App\Models\Product;
use App\Models\Purchase;
use Carbon\Carbon;

class PaymentService
{
    /**
     * Pay product.
     *
     * @param  array $data
     * @return Purchase
     */
    public function pay(array $data): Purchase
    {
        $product = Product::find($data['product_id']);
        $user = auth()->user();

        if ($user->balance < $product->price) {
            throw new DefaultException('You don\'t have enough money to buy!');
        }

        $user->update([
            'balance' => $user->balance - $product->price
        ]);

        $expiresAt = $data['purchase_type'] == PurchaseTypes::RENT->value
            ? Carbon::now()->addHours($data['number_of_hours'])
            : null;

        $purchase = $user->purchases()->create([
            'product_id' => $product->id,
            'expires_at' => $expiresAt,
        ]);

        return $purchase;
    }

    /**
     * Prolong product.
     *
     * @param  array $data
     * @return Purchase
     */
    public function prolong(array $data): Purchase
    {
        $user = auth()->user();
        $purchase = $user->purchases()->find($data['purchase_id']);

        if ($purchase->is_expired) {
            throw new DefaultException('The rental period for this product has expired!');
        }

        if ($user->balance < $purchase->product['price']) {
            throw new DefaultException('You don\'t have enough money to buy!');
        }

        $expiresAt = Carbon::parse($purchase->expires_at)->addHours($data['number_of_hours']);
        $diffHours = $expiresAt->diffInHours($purchase->created_at, true);

        if ($diffHours > 24) {
            throw new DefaultException('You cannot extend the product rental!');
        }

        $purchase->update([
            'expires_at' => $expiresAt,
        ]);

        return $purchase;
    }
}
