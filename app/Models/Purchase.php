<?php

namespace App\Models;

use App\Enums\PurchaseTypes;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Purchase extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'token',
        'expires_at',
    ];

    /**
     * Get purchase type.
     */
    protected function type(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['expires_at']
                ? PurchaseTypes::RENT->value
                : PurchaseTypes::BUYOUT->value,
        );
    }

    /**
     * Check exired rent.
     */
    protected function isExpired(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => $attributes['expires_at'] && Carbon::parse($attributes['expires_at'])->isPast(),
        );
    }

    /**
     * The purchase has a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The purchase has a product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
