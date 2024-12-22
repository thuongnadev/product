<?php

declare(strict_types=1);

namespace Modules\Product\App\Filament\Resources;

use Modules\Product\App\Filament\Resources\ProductResource\Forms\ProductForm;
use Modules\Product\App\Filament\Resources\ProductResource\Pages;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Modules\Product\App\Filament\Resources\ProductResource\Tables\ProductTable;
use Modules\Product\App\Models\Product;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    public static function getNavigationIcon(): string
    {
        return __('product::product.resource.navigation_icon');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('product::product.resource.navigation_group');
    }

    public static function getNavigationLabel(): string
    {
        return __('product::product.resource.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('product::product.resource.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('product::product.resource.plural_model_label');
    }

    public static function getNavigationBadge(): ?string
    {
        return (string) static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return ProductForm::form($form);
    }

    public static function table(Table $table): Table
    {
        return ProductTable::table($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduct::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
