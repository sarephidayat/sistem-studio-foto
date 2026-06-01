<?php

namespace App\Filament\Resources\MasterLabels;

use App\Filament\Resources\MasterLabels\Pages\CreateMasterLabel;
use App\Filament\Resources\MasterLabels\Pages\EditMasterLabel;
use App\Filament\Resources\MasterLabels\Pages\ListMasterLabels;
use App\Filament\Resources\MasterLabels\Schemas\MasterLabelForm;
use App\Filament\Resources\MasterLabels\Tables\MasterLabelsTable;
use App\Models\MasterLabel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterLabelResource extends Resource
{
    protected static ?string $model = MasterLabel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Label Customer';

    public static function form(Schema $schema): Schema
    {
        return MasterLabelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterLabelsTable::configure($table);
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
            'index' => ListMasterLabels::route('/'),
            'create' => CreateMasterLabel::route('/create'),
            'edit' => EditMasterLabel::route('/{record}/edit'),
        ];
    }
}
