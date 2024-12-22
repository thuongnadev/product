<?php

namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class VariationAttributeValue extends Model
{
    use HasFactory,
        HasUlids;

    protected $fillable = [
        'variation_attribute_id',
        'value',
        'slug',
        'display_order',
        'is_active'
    ];

    protected $casts = [
        'display_order' => 'integer',
        'is_active' => 'boolean'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->value);
            }
        });
    }

    public function variationAttribute()
    {
        return $this->belongsTo(VariationAttribute::class, 'variation_attribute_id');
    }

    public function productVariationAttributes(): BelongsTo
    {
        return $this->belongsTo(ProductVariationAttribute::class, 'product_variation_attribute_id');
    }
}
