<?php

namespace App\Filament\Resources\FAQItems;

use App\Filament\Resources\FAQItems\Pages\CreateFAQItem;
use App\Filament\Resources\FAQItems\Pages\EditFAQItem;
use App\Filament\Resources\FAQItems\Pages\ListFAQItems;
use App\Filament\Resources\FAQItems\Schemas\FAQItemForm;
use App\Filament\Resources\FAQItems\Tables\FAQItemsTable;
use App\Models\FAQItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FAQItemResource extends Resource
{
    protected static ?string $model = FAQItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'question';

    public static function form(Schema $schema): Schema
    {
        return FAQItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FAQItemsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFAQItems::route('/'),
            'create' => CreateFAQItem::route('/create'),
            'edit' => EditFAQItem::route('/{record}/edit'),
        ];
    }
}
