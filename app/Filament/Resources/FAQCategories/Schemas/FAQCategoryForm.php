<?php

namespace App\Filament\Resources\FAQCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;

class FAQCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
