<?php

declare(strict_types=1);

namespace Modules\Product\App\Filament\Resources\ProductResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Modules\Category\Entities\Category;
use Modules\Product\App\Filament\Resources\ProductResource;

/**
 * @property \Illuminate\Support\Collection $tagsToAttach
 * @property \Illuminate\Support\Collection $categoriesToAttach
 */
class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $categoryIds = $data['categories'] ?? [];
        $this->categoriesToAttach = Category::whereIn('id', $categoryIds)->get();
        unset($data['categories']);

        return $data;
    }

    protected function afterCreate(): void
    {
        $this->record->categories()->sync($this->categoriesToAttach->pluck('id')->toArray());
    }
}
