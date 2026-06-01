<?php

namespace App\Filament\Resources\MasterLabels\Pages;

use App\Filament\Resources\MasterLabels\MasterLabelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterLabel extends EditRecord
{
    protected static string $resource = MasterLabelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
