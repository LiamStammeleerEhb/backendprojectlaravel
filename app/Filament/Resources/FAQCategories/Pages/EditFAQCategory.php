<?php

namespace App\Filament\Resources\FAQCategories\Pages;

use App\Filament\Resources\FAQCategories\FAQCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFAQCategory extends EditRecord
{
    protected static string $resource = FAQCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
