<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // 1. TANGGAL PESAN
                TextColumn::make('created_at')
                    ->label('Tanggal Pesan')
                    ->dateTime('d M Y H:i'),

                // 2. CUSTOMER (MULTI LINE)
                TextColumn::make('user.name')
                    ->label('Customer')
                    ->badge()
                    ->color('success')
                    ->formatStateUsing(function ($record) {

                        $name = $record->user->name ?? '-';
                        $phone = $record->nomor_telepon ?? '-';
                        $jumlah = $record->jumlah_orang ?? 0;

                        return "
                            <div>
                                <strong>{$name}</strong><br>
                                {$phone}<br>

                                <span style='
                                    background:#e5e7eb;
                                    padding:4px 10px;
                                    border-radius:8px;
                                    font-size:12px;
                                    font-weight:600;
                                '>
                                    Total Customer : {$jumlah}
                                </span>
                            </div>
                        ";
                    })
                    ->html(),

                // 3. BOOKING DETAIL
                TextColumn::make('tanggal')
                    ->label('Booking Detail')
                    ->formatStateUsing(function ($record) {

                        $tanggal = date(
                            'd F Y',
                            strtotime($record->tanggal)
                        );

                        $jam = $record->waktu
                            ? date('H:i', strtotime($record->waktu->waktu))
                            : '-';

                        $studio = $record->studio->nama ?? '-';

                        $studio = $record->studio->nama ?? '-';

                        $colors = [
                            'Kuy Studio 1.0 Oro Oro Dowo' => '#3b82f6', // biru
                            'Kuy Studio 2.0 Suhat' => '#10b981', // hijau
                            'Kuy Studio 3.0 Klampis' => '#f59e0b', // kuning
                            'Kuy Studio 4.0 Kilisuci' => '#ef4444', // merah
                            'Kuy Studio 5.0 Jagakarsa' => '#8b5cf6', // ungu
                            'Kuy Studio 6.0 Badung' => '#06b6d4', // cyan
                            'Kuy Studio 7.0 Affandi' => '#ec4899', // pink
                            'Kuy Studio 8.0 Jember' => '#14b8a6', // teal
                            'Kuy Studio 9.0 Banyumanik' => '#7c3aed', // ungu tua
                            'Kuy Studio 10.0 Labuan' => '#f97316', // orange
                            'Kuy Studio 11.0 Karangasem' => '#84cc16', // lime
                        ];

                        $color = $colors[$studio] ?? '#6b7280';

                        return "
                            <div>

                                <strong>Self Photo Studio</strong><br>

                                {$tanggal} {$jam}<br>

                                <span style='
                                    background:{$color};
                                    color:white;
                                    padding:4px 10px;
                                    border-radius:8px;
                                    font-size:12px;
                                    font-weight:600;
                                '>
                                    {$studio}
                                </span>

                            </div>
                        ";
                    })
                    ->html(),

                // 4. PRODUCT ADDON
                TextColumn::make('background.nama')
                    ->label('Product Addon')
                    ->formatStateUsing(function ($state) {

                        return "
                            <span style='
                                background:#e5e7eb;
                                padding:4px 10px;
                                border-radius:8px;
                                font-size:12px;
                                font-weight:600;
                            '>
                                Background : {$state}
                            </span>
                        ";
                    })
                    ->html(),

                // 5. PAYMENT METHOD
                TextColumn::make('pembayaran.nama')
                    ->label('Payment'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
