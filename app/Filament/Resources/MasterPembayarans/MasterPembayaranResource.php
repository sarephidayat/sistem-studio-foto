<?php

namespace App\Filament\Resources\MasterPembayarans;

use App\Filament\Resources\MasterPembayarans\Pages\CreateMasterPembayaran;
use App\Filament\Resources\MasterPembayarans\Pages\EditMasterPembayaran;
use App\Filament\Resources\MasterPembayarans\Pages\ListMasterPembayarans;
use App\Filament\Resources\MasterPembayarans\Schemas\MasterPembayaranForm;
use App\Filament\Resources\MasterPembayarans\Tables\MasterPembayaransTable;
use App\Models\MasterPembayaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MasterPembayaranResource extends Resource
{
    protected static ?string $model = MasterPembayaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCreditCard;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    protected static ?string $navigationLabel = 'Pembayaran';

    public static function form(Schema $schema): Schema
    {
        return MasterPembayaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MasterPembayaransTable::configure($table);
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
            'index' => ListMasterPembayarans::route('/'),
            'create' => CreateMasterPembayaran::route('/create'),
            'edit' => EditMasterPembayaran::route('/{record}/edit'),
        ];
    }
}
