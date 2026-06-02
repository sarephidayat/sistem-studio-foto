<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Models\Booking;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Customer')
                    ->columns(3)
                    ->schema([

                        Select::make('label_id')
                            ->label('Label Customer')
                            ->relationship('label', 'nama')
                            ->required(),

                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->required(),

                        TextInput::make('nomor_telepon')
                            ->label('Nomor WhatsApp')
                            ->placeholder('081234567890')
                            ->required(),

                    ]),

                Section::make('Lokasi Booking')
                    ->columns(2)
                    ->schema([

                        Select::make('kota_id')
                            ->label('Kota')
                            ->relationship('kota', 'nama')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->afterStateUpdated(fn($set) => $set('studio_id', null))
                            ->required(),

                        Select::make('studio_id')
                            ->label('Outlet')
                            ->placeholder('Pilih kota terlebih dahulu')
                            ->disabled(fn(Get $get) => blank($get('kota_id')))
                            ->options(function (Get $get) {

                                if (!$get('kota_id')) {
                                    return [];
                                }

                                return \App\Models\MasterStudio::query()
                                    ->where('kota_id', $get('kota_id'))
                                    ->orderBy('nama')
                                    ->pluck('nama', 'id');
                            })
                            ->searchable()
                            ->required(),

                    ]),

                Section::make('Detail Booking')
                    ->columns(2)
                    ->schema([

                        DatePicker::make('tanggal')
                            ->label('Tanggal Booking')
                            ->live()
                            ->required(),

                        TextInput::make('jumlah_orang')
                            ->label('Jumlah Orang')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        Select::make('background_id')
                            ->label('Background')
                            ->relationship('background', 'nama')
                            // ->searchable()
                            ->required(),

                        Select::make('pembayaran_id')
                            ->label('Metode Pembayaran')
                            ->relationship('pembayaran', 'nama')
                            ->required(),

                    ]),

                Section::make('Pilih Waktu Booking')
                    ->schema([

                        Radio::make('waktu_id')
                            ->label('')
                            ->live()

                            ->options(function () {

                                return \App\Models\MasterWaktu::query()
                                    ->pluck('waktu', 'id')
                                    ->mapWithKeys(function ($waktu, $id) {

                                        return [
                                            $id => date(
                                                'H:i',
                                                strtotime($waktu)
                                            )
                                        ];

                                    });

                            })

                            ->disableOptionWhen(function ($value, Get $get) {

                                if (
                                    !$get('studio_id') ||
                                    !$get('tanggal')
                                ) {
                                    return false;
                                }

                                return Booking::query()
                                    ->where('studio_id', $get('studio_id'))
                                    ->whereDate('tanggal', $get('tanggal'))
                                    ->where('waktu_id', $value)
                                    ->exists();
                            })

                            ->helperText(function (Get $get) {

                                if (
                                    !$get('studio_id') ||
                                    !$get('tanggal')
                                ) {
                                    return 'Pilih outlet dan tanggal terlebih dahulu';
                                }

                                return 'Jam yang sudah dibooking akan otomatis dinonaktifkan';
                            })

                            ->columns(6)
                            ->required()
                            ->options(function (Get $get) {

                                $booked = [];

                                if ($get('studio_id') && $get('tanggal')) {

                                    $booked = Booking::query()
                                        ->where('studio_id', $get('studio_id'))
                                        ->whereDate('tanggal', $get('tanggal'))
                                        ->pluck('waktu_id')
                                        ->toArray();
                                }

                                return \App\Models\MasterWaktu::query()
                                    ->pluck('waktu', 'id')
                                    ->mapWithKeys(function ($waktu, $id) use ($booked) {

                                        $label = date('H:i', strtotime($waktu));

                                        if (in_array($id, $booked)) {
                                            $label .= ' 🔒 BOOK';
                                        }

                                        return [$id => $label];
                                    });

                            }),

                    ]),


            ]);
    }
}
