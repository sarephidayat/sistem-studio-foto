<?php

namespace App\Filament\Resources\MasterBackgrounds\Pages;

use App\Filament\Resources\MasterBackgrounds\MasterBackgroundResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterBackgrounds extends ListRecords
{
    protected static string $resource = MasterBackgroundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
