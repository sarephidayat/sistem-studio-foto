<?php

namespace App\Filament\Resources\MasterPembayarans\Pages;

use App\Filament\Resources\MasterPembayarans\MasterPembayaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterPembayarans extends ListRecords
{
    protected static string $resource = MasterPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
