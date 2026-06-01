<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // LABEL
                Select::make('label_id')
                    ->label('Label Customer')
                    ->relationship('label', 'nama')
                    ->required(),

                // USER
                Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),

                // BACKGROUND
                Select::make('background_id')
                    ->label('Background')
                    ->relationship('background', 'nama')
                    // ->searchable()
                    ->required(),

                // KOTA
                Select::make('kota_id')
                    ->label('Kota')
                    ->relationship('kota', 'nama')
                    ->required(),

                // STUDIO
                Select::make('studio_id')
                    ->label('Studio')
                    ->relationship('studio', 'nama')
                    ->required(),

                // PEMBAYARAN
                Select::make('pembayaran_id')
                    ->label('Metode Pembayaran')
                    ->relationship('pembayaran', 'nama')
                    ->required(),

                DatePicker::make('tanggal')
                    ->label('Tanggal Booking')
                    ->required(),

                Radio::make('waktu_id')
                    ->label('Pilih Waktu')
                    ->options(function () {
                        return \App\Models\MasterWaktu::all()
                            ->pluck('waktu', 'id')
                            ->mapWithKeys(function ($waktu, $id) {
                                return [$id => date('H:i', strtotime($waktu))];
                            });
                    })
                    ->columns(4) // jadi grid 4 kolom
                    ->required(),



                // JUMLAH ORANG
                TextInput::make('jumlah_orang')
                    ->label('Jumlah Orang')
                    ->numeric()
                    ->required(),

                // JUMLAH ORANG
                TextInput::make('nomor_telepon')
                    ->label('Nomor WhatsApp')
                    ->placeholder('Masukkan nomor WhatsApp (contoh: 081234567890)')
                    ->string()
                    ->required(),
            ]);
    }
}
