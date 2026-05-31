<?php

namespace App\Filament\Resources\MasterWaktus\Pages;

use App\Filament\Resources\MasterWaktus\MasterWaktuResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterWaktus extends ListRecords
{
    protected static string $resource = MasterWaktuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
