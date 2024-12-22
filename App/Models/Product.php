<?php

namespace Modules\Product\App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;
use Modules\Category\Traits\Categorizable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Tags\HasTags;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements HasMedia
{
    use HasFactory,
        SoftDeletes,
        Categorizable,
        InteractsWithMedia,
        HasTags,
        HasUlids;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'barcode',
        'type',
        'description',
        'short_description',
        'price',
        'discount',
        'vat',
        'weight',
        'length',
        'width',
        'height',
        'is_in_stock',
        'is_activated',
        'is_shipped',
        'is_trend',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'discount' => 'decimal:2',
        'vat' => 'decimal:2',
        'weight' => 'decimal:2',
        'length' => 'decimal:2',
        'width' => 'decimal:2',
        'height' => 'decimal:2',
        'is_in_stock' => 'boolean',
        'is_activated' => 'boolean',
        'is_shipped' => 'boolean',
        'is_trend' => 'boolean',
    ];

    public function productVariations()
    {
        return $this->hasMany(ProductVariation::class);
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorizable');
    }
}
