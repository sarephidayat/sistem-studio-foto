<?php

namespace App\Filament\Resources\MasterBackgrounds\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterBackgroundForm
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
