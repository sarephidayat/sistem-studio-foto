<?php

namespace App\Filament\Resources\MasterStudios;

use App\Filament\Resources\MasterStudios\Pages\CreateMasterStudio;
use App\Filament\Resources\MasterStudios\Pages\EditMasterStudio;
use App\Filament\Resources\MasterStudios\Pages\ListMasterStudios;
use App\Filament\Resources\MasterStudios\Schemas\MasterStudioForm;
use App\Filament\Resources\MasterStudios\Tables\MasterStudiosTable;
use App\Models\MasterStudio;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterStudioResource extends Resource
{
    protected static ?string $model = MasterStudio::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBuildingOffice2;

    protected static ?string $recordTitleAttribute = 'nama';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Studio';

    public static function form(Schema $schema): Schema
    {
        return MasterStudioForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterStudiosTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMasterStudios::route('/'),
            'create' => CreateMasterStudio::route('/create'),
            'edit' => EditMasterStudio::route('/{record}/edit'),
        ];
    }
}
