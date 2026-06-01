<?php

namespace App\Filament\Resources\MasterWaktus;

use App\Filament\Resources\MasterWaktus\Pages\CreateMasterWaktu;
use App\Filament\Resources\MasterWaktus\Pages\EditMasterWaktu;
use App\Filament\Resources\MasterWaktus\Pages\ListMasterWaktus;
use App\Filament\Resources\MasterWaktus\Schemas\MasterWaktuForm;
use App\Filament\Resources\MasterWaktus\Tables\MasterWaktusTable;
use App\Models\MasterWaktu;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterWaktuResource extends Resource
{
    protected static ?string $model = MasterWaktu::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClock;

    protected static ?string $recordTitleAttribute = 'waktu';
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Waktu';

    public static function form(Schema $schema): Schema
    {
        return MasterWaktuForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterWaktusTable::configure($table);
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
            'index' => ListMasterWaktus::route('/'),
            'create' => CreateMasterWaktu::route('/create'),
            'edit' => EditMasterWaktu::route('/{record}/edit'),
        ];
    }
}
