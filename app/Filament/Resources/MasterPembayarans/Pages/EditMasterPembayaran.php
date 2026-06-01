<?php

namespace App\Filament\Resources\MasterPembayarans\Pages;

use App\Filament\Resources\MasterPembayarans\MasterPembayaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterPembayaran extends EditRecord
{
    protected static string $resource = MasterPembayaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
