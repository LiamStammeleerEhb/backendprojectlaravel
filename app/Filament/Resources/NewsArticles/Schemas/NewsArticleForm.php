<?php

namespace App\Filament\Resources\NewsArticles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Carbon;

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
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('publication_date')
                    ->required()
                    ->default(fn () => Carbon::today()),
            ]);
    }
}
