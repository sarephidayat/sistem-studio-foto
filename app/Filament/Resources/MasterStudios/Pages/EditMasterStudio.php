<?php

namespace App\Filament\Resources\MasterStudios\Pages;

use App\Filament\Resources\MasterStudios\MasterStudioResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterStudio extends EditRecord
{
    protected static string $resource = MasterStudioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
