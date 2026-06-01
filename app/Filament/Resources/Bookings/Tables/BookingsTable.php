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
                        // dd($record);
            
                        $name = $record->user->name ?? '-';
                        $phone = $record->nomor_telepon ?? '-';
                        $jumlah = $record->jumlah_orang ?? 0;

                        return "
                                Nama: {$name}<br>
                                Telepon: {$phone}<br>
                                Jumlah: {$jumlah} orang
                            ";
                    })
                    ->html()
                    ->wrap(),

                // 3. BOOKING DETAIL
                TextColumn::make('tanggal')
                    ->label('Booking Detail')
                    ->formatStateUsing(function ($record) {


                        $tanggal = $record->tanggal ?? '-';
                        $jam = $record->waktu ? date('H:i', strtotime($record->waktu->waktu)) : '-';

                        return "
                                <strong>Tanggal:</strong> {$tanggal}<br>
                                <strong>Jam:</strong> {$jam}
                            ";
                    })
                    ->html()
                    ->wrap(),

                // 4. PRODUCT ADDON
                TextColumn::make('background.nama')
                    ->label('Background'),

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
