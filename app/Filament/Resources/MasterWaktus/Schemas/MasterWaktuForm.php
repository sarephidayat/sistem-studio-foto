<?php

namespace App\Filament\Resources\MasterWaktus\Schemas;

use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class MasterWaktuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TimePicker::make('waktu')
                    ->required(),
            ]);
    }
}
