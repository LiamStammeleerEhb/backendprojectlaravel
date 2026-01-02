<?php

namespace App\Filament\Resources\ContactMessages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ContactMessageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('email')
                    ->disabled(),
                Textarea::make('message')
                    ->disabled(),
                Toggle::make('handled')
                    ->label('Handled')
                    ->helperText('Mark as handled when this message has been dealt with'),
            ]);
    }
}
