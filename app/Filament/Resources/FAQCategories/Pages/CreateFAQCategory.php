<?php

namespace App\Filament\Resources\FAQCategories\Pages;

use App\Filament\Resources\FAQCategories\FAQCategoryResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQCategory extends CreateRecord
{
    protected static string $resource = FAQCategoryResource::class;
}
