<?php

namespace App\Filament\Resources\FAQCategories\Pages;

use App\Filament\Resources\FAQCategories\FAQCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFAQCategories extends ListRecords
{
    protected static string $resource = FAQCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
