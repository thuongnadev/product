<?php

namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class VariationAttribute extends Model
{
    use HasFactory,
        HasUlids;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'is_active',
        'display_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'display_order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }

    public function productVariationAttributes(): BelongsTo
    {
        return $this->belongsTo(ProductVariationAttribute::class, 'product_variation_attribute_id');
    }

    public function variationAttributeValues()
    {
        return $this->hasMany(VariationAttributeValue::class, 'variation_attribute_value_id');
    }
}
