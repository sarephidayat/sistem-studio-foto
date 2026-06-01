<?php

namespace App\Filament\Pages;

use App\Models\Booking;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class Calendar extends Page
{
    protected string $view = 'filament.pages.calendar';

    protected static ?string $navigationLabel = 'Calendar';

    protected static string|\UnitEnum|null $navigationGroup = 'Transaction';

    protected static string|BackedEnum|null $navigationIcon =
        Heroicon::OutlinedCalendarDays;

    protected function getViewData(): array
    {
        $events = Booking::with([
            'user',
            'studio',
            'waktu',
        ])->get()->map(function ($booking) {

            return [
                'title' => $booking->user->name . ' - ' . $booking->studio->nama,

                'start' => $booking->tanggal . 'T' . $booking->waktu->waktu->format('H:i:s'),
            ];
        });
        // dd($events);

        return [
            'events' => $events,
        ];
    }
}