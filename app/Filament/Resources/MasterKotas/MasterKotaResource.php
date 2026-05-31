<?php

namespace App\Filament\Resources\MasterKotas;

use App\Filament\Resources\MasterKotas\Pages\CreateMasterKota;
use App\Filament\Resources\MasterKotas\Pages\EditMasterKota;
use App\Filament\Resources\MasterKotas\Pages\ListMasterKotas;
use App\Filament\Resources\MasterKotas\Schemas\MasterKotaForm;
use App\Filament\Resources\MasterKotas\Tables\MasterKotasTable;
use App\Models\MasterKota;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterKotaResource extends Resource
{
    protected static ?string $model = MasterKota::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static ?string $recordTitleAttribute = 'nama';

    // protected static ?string $navigationGroup = 'Master Data';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Kota';

    public static function form(Schema $schema): Schema
    {
        return MasterKotaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterKotasTable::configure($table);
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
            'index' => ListMasterKotas::route('/'),
            'create' => CreateMasterKota::route('/create'),
            'edit' => EditMasterKota::route('/{record}/edit'),
        ];
    }
}
