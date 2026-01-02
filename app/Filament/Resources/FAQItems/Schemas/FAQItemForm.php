<?php

namespace App\Filament\Resources\FAQItems\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;


class FAQItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('faq_category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->required(),

                TextInput::make('question')
                    ->required()
                    ->maxLength(255),

                RichEditor::make('answer')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
