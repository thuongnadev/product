<?php

namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ProductVariationAttribute extends Model implements HasMedia
{
    use HasFactory,
        InteractsWithMedia,
        HasUlids;

    protected $fillable = [
        'variation_attribute_id',
        'variation_attribute_value_id',
        'product_variation_id'
    ];

    public function variationAttribute(): HasMany
    {
        return $this->hasMany(VariationAttribute::class, 'variation_attribute_id');
    }

    public function variationAttributeValue(): HasMany
    {
        return $this->hasMany(VariationAttributeValue::class, 'variation_attribute_value_id');
    }

    public function productVariation()
    {
        return $this->belongsTo(ProductVariation::class, 'product_variation_id');
    }
}
