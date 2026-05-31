<?php

namespace App\Filament\Resources\MasterBackgrounds\Pages;

use App\Filament\Resources\MasterBackgrounds\MasterBackgroundResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditMasterBackground extends EditRecord
{
    protected static string $resource = MasterBackgroundResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
