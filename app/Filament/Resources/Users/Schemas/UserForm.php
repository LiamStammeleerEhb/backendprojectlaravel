<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required(),
                DateTimePicker::make('email_verified_at'),
                TextInput::make('password')
                    ->password()
                    ->required(fn (string $context): bool => $context === 'create')
                    ->dehydrateStateUsing(fn ($state) => filled($state) ? $state : null)
                    ->dehydrated(fn ($state) => filled($state))
                    ->label(fn (string $context) => $context === 'create' ? 'Password' : 'New Password'),
                FileUpload::make('profile_picture')
                    ->label('Profile picture')
                    ->image()
                    ->directory('profile-pictures')
                    ->nullable()
                    ->disk('public'),
                Textarea::make('about_me')
                    ->label('About me')
                    ->rows(4)
                    ->nullable(),
                DatePicker::make('birthdate')
                    ->label('Birthdate')
                    ->nullable(),
                Toggle::make('is_admin')
                    ->label('Administrator')
                    ->disabled(fn (Get $get, $record) =>
                        $record &&
                        auth()->id() === $record->id
                    )
                    ->dehydrated(fn (Get $get, $record) =>
                        ! ($record && auth()->id() === $record->id)
                    ),
            ]);
    }
}
