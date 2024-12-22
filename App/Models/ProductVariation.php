<?php

namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductVariation extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia,
        HasUlids;

    protected $fillable = [
        'product_id',
        'sku',
        'barcode',
        'price',
        'discount',
        'stock_quantity',
        'is_activated',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
        'stock_quantity' => 'integer',
        'is_activated' => 'boolean',
    ];

    public function getImageUrlAttribute()
    {
        return $this->getFirstMediaUrl('variation_image');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function productVariationAttributes(): HasMany
    {
        return $this->hasMany(ProductVariationAttribute::class, 'product_variation_id');
    }
}
