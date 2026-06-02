<?php

namespace App\Filament\Resources\MasterStudios\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterStudioForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('kota_id')
                    ->label('Kota')
                    ->relationship('kota', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('nama')
                    ->label('Nama Outlet')
                    ->required(),
            ]);
    }
}
