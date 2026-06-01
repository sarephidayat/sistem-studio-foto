<?php

namespace App\Filament\Resources\MasterLabels\Pages;

use App\Filament\Resources\MasterLabels\MasterLabelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListMasterLabels extends ListRecords
{
    protected static string $resource = MasterLabelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
