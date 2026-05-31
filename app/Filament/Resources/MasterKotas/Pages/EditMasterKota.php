<?php

namespace App\Filament\Resources\MasterKotas\Pages;

use App\Filament\Resources\MasterKotas\MasterKotaResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterKota extends EditRecord
{
    protected static string $resource = MasterKotaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
