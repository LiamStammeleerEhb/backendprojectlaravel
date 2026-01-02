<?php

namespace App\Filament\Resources\FAQItems\Pages;

use App\Filament\Resources\FAQItems\FAQItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFAQItems extends ListRecords
{
    protected static string $resource = FAQItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
