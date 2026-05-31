<?php

namespace App\Filament\Resources\MasterWaktus\Pages;

use App\Filament\Resources\MasterWaktus\MasterWaktuResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterWaktu extends EditRecord
{
    protected static string $resource = MasterWaktuResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
