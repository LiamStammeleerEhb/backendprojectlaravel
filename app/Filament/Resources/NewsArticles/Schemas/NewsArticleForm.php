<?php

namespace App\Filament\Resources\NewsArticles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;
use Filament\Forms\Components\RichEditor;

class NewsArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('news')
                    ->imagePreviewHeight(200)
                    ->disk('public'),
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('publication_date')
                    ->required()
                    ->default(fn () => Carbon::today()),
            ]);
    }
}
