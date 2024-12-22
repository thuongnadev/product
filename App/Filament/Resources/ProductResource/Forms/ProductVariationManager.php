<?php

declare(strict_types=1);

namespace Modules\Product\App\Filament\Resources\ProductResource\Forms;

use Awcodes\TableRepeater\Components\TableRepeater;
use Awcodes\TableRepeater\Header;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Enums\VerticalAlignment;
use Illuminate\Support\Str;
use Modules\Product\App\Models\VariationAttribute;
use Modules\Product\App\Models\VariationAttributeValue;
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\IconPosition;
use TomatoPHP\FilamentMediaManager\Form\MediaManagerInput;

class ProductVariationManager
{
    public static function createVariationsSection(): Tabs
    {
        return Tabs::make('Tabs')
            ->tabs([
                self::Attribute()
            ])
            ->columnSpanFull()
            ->visible(fn(Get $get): bool => $get('type') === 'variable');
    }

    private static function Attribute(): Tabs\Tab
    {
        return Tabs\Tab::make('Các thuộc tính')
            ->icon('heroicon-m-squares-2x2')
            ->iconPosition(IconPosition::After)
            ->schema([
                Actions::make([
                    Action::make('Tạo thuộc tính')
                        ->icon('heroicon-m-squares-2x2')
                        ->color(Color::Teal)
                        ->slideOver()
                        ->modalHeading('Thêm thuộc tính')
                        ->modalIcon('heroicon-m-squares-2x2')
                        ->modalIconColor(Color::Teal)
                        ->modalSubmitActionLabel('Lưu')
                        ->modalWidth(MaxWidth::Medium)
                        ->action(function (array $data) {
                            VariationAttribute::create([
                                'name' => $data['name'],
                                'slug' => $data['slug'],
                                'type' => $data['type'],
                                'is_active' => $data['is_active'],
                                'display_order' => $data['display_order'],
                            ]);

                            Notification::make()
                                ->title('Thông báo')
                                ->icon('heroicon-m-check-circle')
                                ->body('Thuộc tính đã được tạo thành công!')
                                ->success()
                                ->send();
                        })
                        ->form([
                            TextInput::make('name')
                                ->label('Tên thuộc tính')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(string $state, Set $set) => $set('slug', Str::slug($state))),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->unique('variation_attributes', 'slug')
                                ->maxLength(255),

                            Select::make('type')
                                ->label('Loại thuộc tính')
                                ->options([
                                    'select' => 'Dropdown',
                                    'color' => 'Màu sắc',
                                    'size' => 'Kích thước',
                                ])
                                ->default('select')
                                ->required(),

                            Toggle::make('is_active')
                                ->label('Kích hoạt')
                                ->default(true),

                            TextInput::make('display_order')
                                ->label('Thứ tự hiển thị')
                                ->numeric()
                                ->default(0),
                        ]),

                    Action::make('Tạo giá trị thuộc tính')
                        ->icon('heroicon-m-squares-plus')
                        ->color(Color::Green)
                        ->slideOver()
                        ->modalHeading('Thêm giá trị thuộc tính')
                        ->modalIcon('heroicon-m-squares-plus')
                        ->modalIconColor(Color::Green)
                        ->modalSubmitActionLabel('Lưu')
                        ->modalWidth(MaxWidth::Medium)
                        ->action(function (array $data) {
                            VariationAttributeValue::create([
                                'variation_attribute_id' => $data['variation_attribute_id'],
                                'value' => $data['value'],
                                'slug' => $data['slug'],
                                'display_order' => $data['display_order'],
                                'is_active' => $data['is_active'],
                            ]);

                            Notification::make()
                                ->title('Thông báo')
                                ->icon('heroicon-m-check-circle')
                                ->body('Giá trị thuộc tính đã được tạo thành công!')
                                ->success()
                                ->send();
                        })
                        ->form([
                            Select::make('variation_attribute_id')
                                ->label('Thuộc tính')
                                ->options(VariationAttribute::all()->pluck('name', 'id'))
                                ->required(),

                            TextInput::make('value')
                                ->label('Giá trị')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn(string $state, Set $set) => $set('slug', Str::slug($state))),

                            TextInput::make('slug')
                                ->label('Slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(255),

                            Toggle::make('is_active')
                                ->label('Kích hoạt')
                                ->default(true),

                            TextInput::make('display_order')
                                ->label('Thứ tự hiển thị')
                                ->numeric()
                                ->default(0),
                        ]),
                ])->verticalAlignment(VerticalAlignment::End),
                self::createVariationManager(),
            ]);
    }

    private static function createAttributeSelector(): TableRepeater
    {
        return TableRepeater::make('productVariationAttributes')
            ->relationship()
            ->hiddenLabel()
            ->headers([
                Header::make('Ảnh sản phẩm biến thể')->align(Alignment::Center)->width('20%'),
                Header::make('Thuộc tính')->align(Alignment::Center)->width('35%'),
                Header::make('Giá trị thuộc tính')->align(Alignment::Center)->width('35%')
            ])
            ->schema([
                MediaManagerInput::make('Ảnh biến thể')
                    ->label('Ảnh sản phẩm biến thể')
                    ->required()
                    ->schema([])
                    ->defaultItems(1)
                    ->minItems(1)
                    ->maxItems(1)
                    ->columnSpanFull(),

                Select::make('variation_attribute_id')
                    ->label('Thuộc tính')
                    ->relationship('variationAttribute', 'name')
                    ->options(function (Get $get) {
                        $allAttributes = VariationAttribute::pluck('name', 'id');
                        $selectedAttributes = collect($get('../../productVariationAttributes'))
                            ->pluck('variation_attribute_id')
                            ->filter()
                            ->unique()
                            ->toArray();

                        return $allAttributes->except($selectedAttributes);
                    })
                    ->searchable()
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('variation_attribute_value_id', null);
                    }),


                Select::make('variation_attribute_value_id')
                    ->label('Giá trị thuộc tính')
                    ->options(function (Get $get) {
                        return $get('variation_attribute_id')
                            ? VariationAttributeValue::where('variation_attribute_id', $get('variation_attribute_id'))
                            ->pluck('value', 'id')
                            : [];
                    })
                    ->searchable(),

            ])
            ->defaultItems(1)
            ->addActionLabel('Thêm giá trị cho thuộc tính')
            ->reorderable(false)
            ->columnSpanFull();
    }

    private static function createVariationManager(): Repeater
    {
        return Repeater::make('productVariations')
            ->relationship('productVariations')
            ->hiddenLabel()
            ->schema([
                    Grid::make(2)->schema([
                        Toggle::make('is_activated')
                            ->label(__('product::product.form.label.is_activated'))
                            ->default(true)
                            ->inline()
                            ->columnSpanFull(),
                        TextInput::make('stock_quantity')
                            ->label(__('product::product.form.label.stock_quantity'))
                            ->numeric()
                            ->integer()
                            ->minValue(0)
                            ->placeholder(__('product::product.form.placeholder.stock_quantity'))
                            ->suffix(__('product::product.form.suffix.stock_quantity'))
                            ->helperText(__('product::product.form.helper_text.stock_quantity')),
                        TextInput::make('sku')
                            ->label(__('product::product.form.label.variation.sku'))
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText(__('product::product.form.helper_text.variation.sku')),
                        TextInput::make('barcode')
                            ->label(__('product::product.form.label.variation.barcode'))
                            ->unique(ignoreRecord: true)
                            ->maxLength(255)
                            ->helperText(__('product::product.form.helper_text.variation.barcode')),
                        TextInput::make('price')
                            ->label(__('product::product.form.label.variation.price'))
                            ->numeric()
                            ->type('number')
                            ->prefix('đ')
                            ->formatStateUsing(fn ($state) => is_null($state) ? '0' : number_format((float) $state, 0, ',', '.'))
                            ->maxValue(999999999999999.99)
                            ->required()
                            ->default(0)
                            ->helperText(__('product::product.form.helper_text.variation.price')),
                        TextInput::make('discount')
                            ->label(__('product::product.form.label.variation.discount'))
                            ->numeric()
                            ->prefix('đ')
                            ->formatStateUsing(fn ($state) => number_format((float) $state, 0, ',', '.'))
                            ->maxValue(999999999999999.99)
                            ->default(0)
                            ->helperText(__('product::product.form.helper_text.variation.discount')),
                    ]),
                self::createAttributeSelector(),
            ])
            ->defaultItems(1)
            ->addable(false)
            ->reorderable(false);
    }
}
