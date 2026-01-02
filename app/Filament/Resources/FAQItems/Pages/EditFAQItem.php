<?php

namespace App\Filament\Resources\FAQItems\Pages;

use App\Filament\Resources\FAQItems\FAQItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFAQItem extends EditRecord
{
    protected static string $resource = FAQItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
