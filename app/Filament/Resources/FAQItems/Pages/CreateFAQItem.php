<?php

namespace App\Filament\Resources\FAQItems\Pages;

use App\Filament\Resources\FAQItems\FAQItemResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFAQItem extends CreateRecord
{
    protected static string $resource = FAQItemResource::class;
}
