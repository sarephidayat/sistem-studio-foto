<?php

namespace App\Filament\Resources\MasterStudios\Pages;

use App\Filament\Resources\MasterStudios\MasterStudioResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterStudios extends ListRecords
{
    protected static string $resource = MasterStudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
