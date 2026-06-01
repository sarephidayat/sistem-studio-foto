<?php

namespace App\Filament\Resources\Packages\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PackageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextInput::make('title')
                    ->required(),

                TextInput::make('price')
                    ->required(),

                TextInput::make('old_price'),

                Textarea::make('features')
                    ->helperText('Satu fitur per baris')

                    ->formatStateUsing(function ($state) {

                        return is_array($state)
                            ? implode("\n", $state)
                            : $state;
                    })

                    ->dehydrateStateUsing(function ($state) {

                        return array_filter(
                            array_map('trim', explode("\n", $state))
                        );
                    }),

                TextInput::make('category'),

                Toggle::make('is_active')
                    ->default(true),

            ]);
    }
}