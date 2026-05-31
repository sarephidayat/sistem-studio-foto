<?php

namespace App\Filament\Resources\MasterLabels\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class MasterLabelForm
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
