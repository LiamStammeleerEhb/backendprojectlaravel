<?php

namespace App\Filament\Resources\FAQCategories;

use App\Filament\Resources\FAQCategories\Pages\CreateFAQCategory;
use App\Filament\Resources\FAQCategories\Pages\EditFAQCategory;
use App\Filament\Resources\FAQCategories\Pages\ListFAQCategories;
use App\Filament\Resources\FAQCategories\Schemas\FAQCategoryForm;
use App\Filament\Resources\FAQCategories\Tables\FAQCategoriesTable;
use App\Models\FAQCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class FAQCategoryResource extends Resource
{
    protected static ?string $model = FAQCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FAQCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FAQCategoriesTable::configure($table);
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
            'index' => ListFAQCategories::route('/'),
            'create' => CreateFAQCategory::route('/create'),
            'edit' => EditFAQCategory::route('/{record}/edit'),
        ];
    }
}
