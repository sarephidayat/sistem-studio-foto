<?php

namespace App\Filament\Resources\MasterBackgrounds;

use App\Filament\Resources\MasterBackgrounds\Pages\CreateMasterBackground;
use App\Filament\Resources\MasterBackgrounds\Pages\EditMasterBackground;
use App\Filament\Resources\MasterBackgrounds\Pages\ListMasterBackgrounds;
use App\Filament\Resources\MasterBackgrounds\Schemas\MasterBackgroundForm;
use App\Filament\Resources\MasterBackgrounds\Tables\MasterBackgroundsTable;
use App\Models\MasterBackground;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterBackgroundResource extends Resource
{
    protected static ?string $model = MasterBackground::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Background';

    public static function form(Schema $schema): Schema
    {
        return MasterBackgroundForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterBackgroundsTable::configure($table);
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
            'index' => ListMasterBackgrounds::route('/'),
            'create' => CreateMasterBackground::route('/create'),
            'edit' => EditMasterBackground::route('/{record}/edit'),
        ];
    }
}
