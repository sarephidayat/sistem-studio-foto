<?php

namespace App\Filament\Resources\MasterKotas\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterKotaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
            ]);
    }
}
